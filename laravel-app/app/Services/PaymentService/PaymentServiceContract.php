<?php
namespace App\Services\PaymentService;

interface PaymentServiceContract
{
    public function payment(int $orderId);
}
