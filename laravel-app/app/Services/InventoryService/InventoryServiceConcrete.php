<?php

namespace App\Services\InventoryService;

use Illuminate\Support\Facades\Log;
use App\Repositories\OrderRepository;

class InventoryServiceConcrete implements InventoryServiceContract
{

    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    public function updateTheInventory(int $orderId)
    {
        try {
            $order = $this->orderRepository->findOrderById($orderId);

            Log::info("ORDER SERVICE :: Updaing the inventory...", [
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);
        } catch (\Throwable $th) {
            Log::error("ORDER SERVICE :: Error while Updating the inventory...", [
            'order_id' => $orderId,
            'msg' => $th->getMessage(),
            'error' => $th->getTrace()
        ]);
            throw $th;
        }
        
    }


}
