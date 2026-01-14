<?php

use App\Http\Controllers\WebhookController;

Route::post('/xendit/webhook', [WebhookController::class, 'handle']);
Route::post('/payment/callback', [WebhookController::class, 'handleCryptomus'])->name('api.payment.callback');
