<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        info($request->all());

        $payment = Payment::where('mt_order_id', $request->get('custom_field1'))
            ->first();

        if ($payment) {
            $orderId = $request->get('order_id');
            $statusCode = $request->get('status_code');
            $grossAmount = $request->get('gross_amount');
            $serverKey = config('services.midtrans.server_key');
            $reqSignature = $request->get('signature_key');
            $signature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

            if ($signature != $reqSignature) {
                info('invalid-signature', [
                    'payload' => $request->all(),
                    'signature' => $signature,
                    'req_signature' => $reqSignature,
                ]);

                return abort(404);
            }

            $payment->fill([
                'status' => $request->get('transaction_status'),
            ]);
            $payment->is_paid = 'settlement' == $request->get('transaction_status');
            $payment->save();
        }

        return response()->noContent();
    }
}
