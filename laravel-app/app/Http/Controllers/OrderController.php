<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService\OrderServiceContract;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    use ApiResponseTrait;

    public function __construct(protected OrderServiceContract $orderService)
    {
    }
    
    /**
     * Store a newly created order in the DB.
     */
    public function store(CreateOrderRequest $request)
    {
        return $this->successResponse(201, $this->orderService->storeNewOrder($request->validated()));
    }
}
