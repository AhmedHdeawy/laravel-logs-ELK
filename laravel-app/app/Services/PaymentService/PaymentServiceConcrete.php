<?php


namespace App\Services\PaymentService;

use Illuminate\Support\Facades\Log;
use App\Repositories\OrderRepository;

class PaymentServiceConcrete implements PaymentServiceContract
{

    public function __construct(protected OrderRepository $orderRepository)
    {
    }
    
    public function payment(int $orderId)
    {
        $order = $this->orderRepository->findOrderById($orderId);

        Log::info("ORDER SERVICE :: check the payment...", [
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);
    }


}
