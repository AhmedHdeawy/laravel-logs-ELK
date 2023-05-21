<?php


namespace App\Services\PaymentService;

use Illuminate\Support\Facades\Log;

class PaymentServiceConcrete implements PaymentServiceContract
{
    public function payment(int $orderId)
    {
        Log::error("ORDER SERVICE :: check the payment...", [
            'order_id' => $orderId,
        ]);
    }


}
