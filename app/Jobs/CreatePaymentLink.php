<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CreatePaymentLink
{
    use Dispatchable;

    protected $midtransBaseUrl;

    protected $serverKey;

    protected $webhookUrl;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Registration $registration
    ) {
        $this->midtransBaseUrl = config('services.midtrans.host');
        $this->serverKey = config('services.midtrans.server_key');
        $this->webhookUrl = config('services.midtrans.webhook_url');
    }

    /**
     * Execute the job.
     */
    public function handle(): ?Payment
    {
        $url = sprintf('%s/v1/payment-links', $this->midtransBaseUrl);
        $orderId = Str::orderedUuid()->toString();
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => sprintf('Basic %s', base64_encode(sprintf('%s:', $this->serverKey))),
            'X-Override-Notification' => $this->webhookUrl ?? route('api.webhook'),
        ])
            ->post($url, [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => 20000,
                ],
                'usage_limit' => 1,
                'title' => 'Biaya Registrasi Smartgama',
                'customer_required' => false,
                'expiry' => [
                    'duration' => 5,
                    'unit' => 'days',
                ],
                'callbacks' => [
                    'finish' => 'https://pendaftaranbimbelsmartgama.my.id/student/home',
                ],
                'custom_field1' => $orderId,
            ]);

        info($response->json());

        if ($response->successful()) {
            $responseData = $response->json();

            return Payment::create([
                'registration_id' => $this->registration->id,
                'jumlah' => 20000,
                'tanggal' => now(),
                'valid_until' => now()->addDays(4),
                'mt_order_id' => $responseData['order_id'],
                'payment_url' => $responseData['payment_url'],
            ]);
        }

        return null;
    }
}
