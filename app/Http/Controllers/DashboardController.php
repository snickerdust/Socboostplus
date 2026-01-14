<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class DashboardController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return $this->adminDashboard();
        }

        return $this->userDashboard($user->id);
    }

    protected function adminDashboard()
    {
        // Fetch all orders
        $orders = $this->firebase->getReference('orders')->getValue();
        
        // Fetch for Manage Tabs
        $products = $this->firebase->getReference('products')->getValue();
        $offers = $this->firebase->getReference('offers')->getValue();
        $chats = $this->firebase->getReference('chats')->getValue();

        return view('admin.dashboard', [
            'orders' => $orders ?? [],
            'products' => $products ?? [],
            'offers' => $offers ?? [],
            'chats' => $chats ?? []
        ]);
    }

    protected function userDashboard($userId)
    {
        // Fetch user's orders
        // Note: Firebase filtering in PHP is not efficient for large datasets, 
        // but refined query capability depends on rule indexing.
        // For simplicity in this scope: fetch all and filter (optimized later) 
        // OR construct path if orders are indexed by user (they aren't currently).
        // Let's rely on filtering collection for now (small scale).
        
        $allOrders = $this->firebase->getReference('orders')->getValue();
        $myOrders = [];

        if ($allOrders) {
            foreach ($allOrders as $id => $order) {
                if (isset($order['user_id']) && $order['user_id'] == $userId) {
                    $order['id'] = $id; // Ensure ID is attached
                    $myOrders[] = $order;
                }
            }
        }

        // Sort by date desc
        usort($myOrders, fn($a, $b) => strtotime($b['created_at']) - strtotime($a['created_at']));

        return view('dashboard', [
            'orders' => $myOrders
        ]);
    }

    public function updateStatus(Request $request, $orderId)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate(['status' => 'required|string']);
        
        $this->firebase->getReference('orders/' . $orderId)->update([
            'status' => $validated['status']
        ]);

        return back()->with('success', 'Order status updated');
    }
}
