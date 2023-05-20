<?php

namespace App\Services\OrderService;

interface OrderServiceContract
{
    public function storeNewOrder(array $data);
}
