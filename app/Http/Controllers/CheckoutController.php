<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    protected ProductService $productService;

    protected $firebase;

    public function __construct(ProductService $productService, \App\Services\FirebaseService $firebaseService)
    {
        $this->productService = $productService;
        $this->firebase = $firebaseService->getDatabase();
    }

    public function index(Request $request)
    {
        $id = $request->input('id');

        if (!$id) {
            abort(404, 'Product identifier missing');
        }

        // Parse ID format: platform-category-index
        // Example: instagram-followers-2
        $parts = explode('-', $id);
        
        $quality = 'high_quality'; // Default

        if (count($parts) === 3) {
            // Legacy/Short format: platform-category-index -> assume high_quality
            [$platform, $category, $index] = $parts;
        } elseif (count($parts) === 4) {
            // New format: platform-category-quality-index
            [$platform, $category, $quality, $index] = $parts;
        } else {
            abort(404, 'Invalid product identifier');
        }

        // Normalize quality key from URL/Input
        $inputQuality = $request->input('quality');
        if ($inputQuality === 'premium') $quality = 'premium';
        if ($quality === 'high') $quality = 'high_quality';
        
        $product = $this->productService->getProduct($platform, $category, $quality, (int)$index);

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Get ALL products for this platform, grouped by category
        // This allows the user to switch to "Instagram Likes" from "Instagram Followers"
        $allProducts = $this->productService->getAllProducts();
        
        // --- CASE SENSITIVITY FIX --- 
        // Normalize $platform and $category to match keys in $allProducts exactly
        // Example: URL has 'instagram', DB has 'Instagram'
        
        // 1. Normalize Platform
        $foundPlatform = false;
        foreach (array_keys($allProducts) as $dbPlatform) {
            if (strcasecmp($dbPlatform, $platform) === 0) {
                // If match found (case-insensitive), use the DB key
                $platform = $dbPlatform; 
                $foundPlatform = true;
                break;
            }
        }
        
        // 2. Normalize Category (only if platform found)
        if ($foundPlatform && isset($allProducts[$platform])) {
             foreach (array_keys($allProducts[$platform]) as $dbCategory) {
                if (strcasecmp($dbCategory, $category) === 0) {
                    $category = $dbCategory;
                    break;
                }
            }
        }
        
        // Re-fetch platform products with corrected key
        $allPlatformProducts = $allProducts[$platform] ?? [];

        $flatProducts = [];
        foreach ($allPlatformProducts as $cat => $qualities) {
            // $qualities is now array ['high_quality' => [...], 'premium' => [...]]
            if (!is_array($qualities)) continue;

            foreach ($qualities as $qualKey => $items) {
                if (!is_array($items)) continue;

                foreach ($items as $idx => $item) {
                    // ID: platform-category-quality-index
                    $itemId = $platform . '-' . $cat . '-' . $qualKey . '-' . $idx;
                    $item['id'] = $itemId;
                    $item['name'] = number_format($item['quantity']) . ' ' . str_replace('_', ' ', $cat) . ' (' . str_replace('_', ' ', $qualKey) . ')';
                    $flatProducts[$itemId] = $item;
                }
            }
        }

        // Fetch Exclusive Offers from Firebase
        $offers = $this->firebase->getReference('offers')->getValue() ?? [];
        $offers = array_values($offers);

        // Sanitize offers to ensure JS types are correct
        $offers = array_map(function($offer) {
            return [
                'id' => $offer['id'] ?? uniqid(),
                'name' => $offer['name'] ?? 'Offer',
                'price' => (float)($offer['price'] ?? 0),
                'platform' => isset($offer['platform']) ? (string)$offer['platform'] : null,
                'original_price' => isset($offer['original_price']) ? (float)$offer['original_price'] : null,
                'selected' => false
            ];
        }, $offers);
        
        // If empty AND we have no fallback logic desired (or maybe we do want fallback?)
        // User asked to sync with admin, so if admin deletes all, it should be empty.
        // But the previous code had a fallback if empty. Let's keep fallback only if REALLY needed, 
        // but user said "masi kosong" so they expect their admin data.
        // I will REMOVE the fallback hardcoded offers to respect Admin's control.
        if (empty($offers)) {
             // Optional: Keep empty or provide generic placeholder if truly zero offers exist?
             // Let's stick to true admin data.
        }

        return view('checkout', [
            'product' => $product,
            'flatProducts' => $flatProducts,
            'allPlatformProducts' => $allPlatformProducts,
            'allProducts' => $allProducts,
            'offers' => $offers,
            'id' => $id,
            'platform' => $platform,
            'category' => $category,
            'initialQuality' => $quality === 'high_quality' ? 'high' : $quality
        ]);

    }

    public function pay(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'total_price' => 'required|numeric',
        ]);

        $orderId = 'ORD-' . strtoupper(uniqid());

        try {
            // --- COINBASE COMMERCE API (Simple Key) ---
            $apiKey = env('COINBASE_API_KEY');
            if (!$apiKey) {
                throw new \Exception('Coinbase Commerce API Key not set in .env');
            }

            $client = new Client([
                'timeout'  => 30.0,
                'force_ip_resolve' => 'v4', // Force IPv4 to avoid IPv6 timeouts
            ]);

            $baseUrl = 'https://api.commerce.coinbase.com/charges';
            
            $apiBody = [
                'name' => 'Order ' . $orderId,
                'description' => 'Service for ' . $request->username,
                'pricing_type' => 'fixed_price',
                'local_price' => [
                    'amount' => strval($request->total_price),
                    'currency' => 'USD',
                ],
                'metadata' => [
                    'order_id' => $orderId,
                    'user_id' => auth()->id() ?? 'guest',
                ],
                'redirect_url' => route('dashboard'), // Success redirect
                'cancel_url' => route('checkout', ['id' => $request->product_id]),
            ];

            \Illuminate\Support\Facades\Log::info('Creating Coinbase Charge', ['body' => $apiBody]);

            $response = $client->post($baseUrl, [
                'headers' => [
                    'X-CC-Api-Key' => $apiKey,
                    'X-CC-Version' => '2018-03-22',
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $apiBody,
                'http_errors' => false,
                'verify' => false, 
                'force_ip_resolve' => 'v4',
            ]);

            // --- RESPONSE HANDLING ---
            $bodyStr = (string)$response->getBody();
            \Illuminate\Support\Facades\Log::info('Coinbase Response: ' . $bodyStr);
            
            $result = json_decode($bodyStr, true);

            if ($response->getStatusCode() >= 400) {
                 \Illuminate\Support\Facades\Log::error('Coinbase API Error: ' . $bodyStr);
                 throw new \Exception('Coinbase API returned error: ' . ($result['error']['message'] ?? $response->getReasonPhrase()));
            }
            
            // Normalize result (Commerce API wraps in 'data', CDP might be root or 'data')
            $data = $result['data'] ?? $result;

            if (isset($data['hosted_url'])) {
                 $paymentUrl = $data['hosted_url'];
                 $coinbaseId = $data['id'] ?? null;
            } elseif (isset($data['admin_hosted_url'])) {
                 $paymentUrl = $data['admin_hosted_url'];
                 $coinbaseId = $data['id'] ?? null;
            } elseif (isset($data['url'])) {
                $paymentUrl = $data['url'];
            } else {
                 \Illuminate\Support\Facades\Log::error('Coinbase API Unknown Response: ' . $bodyStr);
                 throw new \Exception('Could not retrieve payment URL from Coinbase.');
            }

            // Save order to Firebase
            $this->firebase->getReference('orders/' . $orderId)->set([
                'user_id' => auth()->id(),
                'email' => $request->email,
                'target_username' => $request->username,
                'product_id' => $request->product_id,
                'total_price_usd' => $request->total_price,
                'status' => 'pending_payment',
                'payment_gateway' => 'coinbase',
                'coinbase_link_id' => $coinbaseId,
                'payment_url' => $paymentUrl,
                'created_at' => now()->toIso8601String(),
                'upsells' => [
                    'quality' => $request->input('upsell_quality', 'essential'),
                    'speed' => $request->input('upsell_speed', 'standard'),
                    'protection' => $request->has('upsell_protection'),
                    'exclusive_offers' => json_decode($request->input('exclusive_offers', '[]')),
                ]
            ]);

            return redirect()->away($paymentUrl);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Coinbase Payment Error: ' . $e->getMessage());
            // Show error to user
            return back()->withErrors(['payment' => 'Payment initiation failed: ' . $e->getMessage()]);
        }
    }
}
