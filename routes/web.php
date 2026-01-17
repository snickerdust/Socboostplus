<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Services\ProductService;

Route::get('/', function (ProductService $productService) {
    $products = $productService->getAllProducts();
    return view('landing', compact('products'));
})->name('landing');

Route::get('/products/facebook', [App\Http\Controllers\ProductController::class, 'facebook'])->name('products.facebook');
Route::get('/products/instagram', [App\Http\Controllers\ProductController::class, 'instagram'])->name('products.instagram');
Route::get('/products/tiktok', [App\Http\Controllers\ProductController::class, 'tiktok'])->name('products.tiktok');

// Static Pages
Route::view('/about-us', 'about')->name('about');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/contact', 'contact')->name('contact');
Route::view('/refund-policy', 'refund-policy')->name('refund-policy');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
});


// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Chat
    Route::post('/chat/send', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/fetch', [\App\Http\Controllers\ChatController::class, 'fetchMessages'])->name('chat.fetch');

    // Admin Only
    Route::middleware([\App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {
        // Admin Chat Polling
        Route::get('/admin/chat/list', [\App\Http\Controllers\ChatController::class, 'fetchAdminChats'])->name('admin.chat.list');
        Route::get('/admin/chat/messages', [\App\Http\Controllers\ChatController::class, 'fetchConversation'])->name('admin.chat.messages');

        Route::patch('/admin/orders/{orderId}/status', [\App\Http\Controllers\DashboardController::class, 'updateStatus'])->name('admin.orders.status');
        
        // Product & Offer CRUD
        Route::post('/admin/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
        Route::put('/admin/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/admin/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');
        
        Route::post('/admin/offers', [\App\Http\Controllers\Admin\OfferController::class, 'store'])->name('admin.offers.store');
        Route::delete('/admin/offers/{id}', [\App\Http\Controllers\Admin\OfferController::class, 'destroy'])->name('admin.offers.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
