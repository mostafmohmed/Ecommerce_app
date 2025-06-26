<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayPalService
{
    protected $baseUrl;
    protected $clientId;
    protected $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.paypal.base_url');
        $this->clientId = config('services.paypal.client_id');
        $this->secret = config('services.paypal.secret');
    }

    public function getAccessToken()
    {
        $response = Http::withBasicAuth($this->clientId, $this->secret)
            ->asForm()
             ->withOptions(['verify' => false])
            ->post("{$this->baseUrl}/v1/oauth2/token", [
                'grant_type' => 'client_credentials'
            ]);

        return $response['access_token'] ?? null;
    }

    public function createOrder($amount, $currency = 'USD')
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)
        ->withOptions(['verify' => false]) 
            ->post("{$this->baseUrl}/v2/checkout/orders", [
                "intent" => "CAPTURE",
                "purchase_units" => [[
                    "amount" => [
                        "currency_code" => $currency,
                        "value" => $amount
                    ]
                ]],
                "application_context" => [
                    "return_url" => route('paypal.success'),
                    "cancel_url" => route('paypal.cancel'),
                ]
            ]);

        return $response->json();
    }

    public function captureOrder($orderId)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)->withOptions(['verify' => false]) 
            ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token');

        return $response->json();
    }
}