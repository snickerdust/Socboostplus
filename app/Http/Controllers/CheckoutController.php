<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected ProductService $productService;

    protected $firebase;

    public function __construct(ProductService $productService, \App\Services\FirebaseService $firebaseService)
    {
        $this->productService = $productService;
        $this->firebase = $firebaseService->getDatabase();
    }

    public function index(Request $request, string $id)
    {
        // Parse ID format: platform-category-index
        // Example: instagram-followers-2
        $parts = explode('-', $id);
        
        if (count($parts) !== 3) {
            abort(404, 'Invalid product identifier');
        }

        [$platform, $category, $index] = $parts;
        
        $product = $this->productService->getProduct($platform, $category, (int)$index);

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Get ALL products for this platform, grouped by category
        // This allows the user to switch to "Instagram Likes" from "Instagram Followers"
        // Flatten products for JS usage
        $allPlatformProducts = $this->productService->getAllProducts()[$platform] ?? [];
        $flatProducts = [];
        foreach ($allPlatformProducts as $cat => $items) {
            foreach ($items as $idx => $item) {
                $itemId = $platform . '-' . $cat . '-' . $idx;
                $item['id'] = $itemId;
                $item['name'] = number_format($item['quantity']) . ' ' . str_replace('_', ' ', $cat);
                $flatProducts[$itemId] = $item;
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
            'offers' => $offers,
            'id' => $id,
            'platform' => $platform,
            'category' => $category
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

        // Create Order ID
        $orderId = 'ORD-' . strtoupper(uniqid());

        try {
            // Cryptomus Integration
            $merchantId = env('CRYPTOMUS_MERCHANT_ID');
            $paymentKey = env('CRYPTOMUS_PAYMENT_KEY');

            if (!$merchantId || !$paymentKey) {
                throw new \Exception('Cryptomus credentials not configured.');
            }

            $client = new \GuzzleHttp\Client();

            // Prepare payload
            $data = [
                'amount' => (string) $request->total_price,
                'currency' => 'USD',
                'order_id' => $orderId,
                'url_return' => route('dashboard'),
                'url_callback' => route('api.payment.callback'), // We'll need to define this route later or leave it for now
                'is_payment_multiple' => false,
                'lifetime' => 3600,
                'to_currency' => 'USDT' // Optional: suggest paying in USDT, but user can choose others
            ];

            // Generate Signature
            // Sign = md5(base64_encode(json_encode($data, JSON_UNESCAPED_UNICODE)) . $apiKey)
            $payload = json_encode($data, JSON_UNESCAPED_UNICODE);
            $sign = md5(base64_encode($payload) . $paymentKey);

            $response = $client->post('https://api.cryptomus.com/v1/payment', [
                'headers' => [
                    'merchant' => $merchantId,
                    'sign' => $sign,
                    'Content-Type' => 'application/json'
                ],
                'body' => $payload,
                'verify' => false, // Keep for local dev
            ]);

            $body = json_decode($response->getBody(), true);

            if (!isset($body['result'])) {
                 throw new \Exception('Invalid Cryptomus Response: ' . $response->getBody());
            }

            $result = $body['result'];
            $paymentUrl = $result['url'];
            $uuid = $result['uuid'];

            // Save order to Firebase
            $this->firebase->getReference('orders/' . $orderId)->set([
                'user_id' => auth()->id(),
                'email' => $request->email,
                'target_username' => $request->username,
                'product_id' => $request->product_id,
                'total_price_usd' => $request->total_price,
                'status' => 'pending_payment',
                'payment_gateway' => 'cryptomus',
                'cryptomus_uuid' => $uuid,
                'cryptomus_url' => $paymentUrl,
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
            \Illuminate\Support\Facades\Log::error('Cryptomus Payment Error: ' . $e->getMessage());
            return back()->withErrors(['payment' => 'Payment initiation failed. Please try again later.']);
        }
    }
}
