<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    protected $firebase;

    public function __construct(\App\Services\FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    public function handle(Request $request)
    {
        $token = $request->header('x-callback-token');

        // Optional: Validate token if configured
        // WARNING: We bypass validation ONLY for local environment testing.
        // In Production, strict token validation is enforced.
        if (config('app.env') !== 'local' && config('services.xendit.webhook_token') && $token !== config('services.xendit.webhook_token')) {
            abort(403, 'Invalid token');
        }

        $payload = $request->all();
        // Xendit External ID matches our Order ID
        $orderId = $payload['external_id'] ?? null;

        if (!$orderId) {
            return response()->json(['status' => 'ignored', 'message' => 'No order ID']);
        }

        if (isset($payload['status']) && $payload['status'] === 'PAID') {
            // Update order status to paid
            $this->firebase->getReference("orders/{$orderId}/status")->set('paid');
            
            // Log for debugging
            Log::info("Order {$orderId} status updated to PAID via Webhook");
        }

        if (isset($payload['status']) && $payload['status'] === 'EXPIRED') {
            $this->firebase->getReference("orders/{$orderId}/status")->set('expired');
        }

        return response()->json(['status' => 'ok']);
    }

    public function handleCryptomus(Request $request)
    {
        // 1. Get Data
        $data = $request->all();
        
        // 2. Extract Sign
        $sign = $data['sign'] ?? null;
        unset($data['sign']); // Remove sign from data to calculate hash

        if (!$sign) {
            return response()->json(['status' => 'error', 'message' => 'No signature'], 400);
        }

        // 3. Verify Signature
        $paymentKey = env('CRYPTOMUS_PAYMENT_KEY');
        $hash = md5(base64_encode(json_encode($data, JSON_UNESCAPED_UNICODE)) . $paymentKey);

        if ($sign !== $hash) {
            // For debugging, you might log the mismatch but don't expose it
            // Log::error("Cryptomus Sign Mismatch: Received $sign, Calculated $hash");
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        }

        // 4. Process Payment
        $orderId = $data['order_id'] ?? null;
        $status = $data['status'] ?? null; // paid, paid_over, wrong_amount, process, fail...

        if ($orderId && in_array($status, ['paid', 'paid_over'])) {
             $this->firebase->getReference("orders/{$orderId}/status")->set('paid');
             Log::info("Cryptomus Order {$orderId} status updated to PAID");
        }

        return response()->json(['status' => 'ok']);
    }
}
