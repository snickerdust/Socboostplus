<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class XenditService
{
    protected string $baseUrl = 'https://api.xendit.co';

    public function createPaymentLink(array $data)
    {
        return Http::withBasicAuth(
            config('services.xendit.secret_key'),
            ''
        )->post($this->baseUrl . '/v2/invoices', [
            'external_id' => $data['external_id'],
            'amount'      => $data['amount'],
            'payer_email' => $data['email'],
            'description' => $data['description'],
            'success_redirect_url' => $data['success_url'],
            'failure_redirect_url' => $data['failure_url'],
        ])->json();
    }
}