<?php

namespace App\Services\InventoryService;

interface InventoryServiceContract
{
    public function updateTheInventory(int $orderId);
}
