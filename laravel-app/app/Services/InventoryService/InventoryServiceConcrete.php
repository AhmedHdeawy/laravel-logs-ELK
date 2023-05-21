<?php

namespace App\Services\InventoryService;

use Illuminate\Support\Facades\Log;

class InventoryServiceConcrete implements InventoryServiceContract
{
    public function updateTheInventory(int $orderId)
    {
        Log::error("Updating the inventory...", [
            'order_id' => $orderId,
        ]);
    }


}
