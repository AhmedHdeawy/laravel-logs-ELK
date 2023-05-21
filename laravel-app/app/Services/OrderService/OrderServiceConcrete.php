<?php

namespace App\Services\OrderService;

use App\Jobs\OrderPaymentJob;
use App\Jobs\UpdateInventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\OrderRepository;

class OrderServiceConcrete implements OrderServiceContract
{
    public const LOG_PRFIX = 'ORDER SERVICE :: ';
    public const USER_ID = 23;

    protected array $orderData;

    public function __construct(protected OrderRepository $orderRepository)
    {
    }

    public function storeNewOrder(array $data)
    {
        $this->orderData = $data;

        DB::beginTransaction();
        try {
            // check the inventory....
            $this->validateTheRequest();

            // prepare the data....
            $this->prepareOrderData();

            $order = $this->orderRepository->storeNewOrder($this->orderData);
            DB::commit();
        } catch (\Throwable $th) {
            Log::error(self::LOG_PRFIX . "Can't place the order", [
                'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
                'message' => $th->getMessage(),
                'error' => $th->__toString()
            ]);
            DB::rollBack();
            throw $th;
        }

        $this->runJobs($order->id);

        return $order;
    }


    private function validateTheRequest()
    {
        # code...
        Log::info(self::LOG_PRFIX . "Start request validation", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
            'data' => $this->orderData
        ]);

        // check the inventory....
        $this->checkInventory();

        // check user limit....
        $this->checkUserLimit();

        // check the Coupon....
        $this->checkCoupon();
        
        Log::info(self::LOG_PRFIX . "all checks are passed", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
            'data' => $this->orderData
        ]);
    }


    private function checkInventory()
    {
        # code...
        Log::info(self::LOG_PRFIX . "Check the inventory", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID
        ]);
    }

    private function checkUserLimit()
    {
        # code...
        Log::info(self::LOG_PRFIX . "Check the User Limit", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
            'allowed_limit' => 4,
            'actual_limit' => 2
        ]);

        // throw new \Exception("Error Processing Request", 1);
        
    }


    private function checkCoupon()
    {
        # code...
        Log::info(self::LOG_PRFIX . "Check the given coupon", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
            'coupon' => $this->orderData['coupon_code'] ?? ''
        ]);
    }


    private function prepareOrderData()
    {
        $ready = array_merge($this->orderData, ['stack' => 'elk']);

        # code...
        Log::info(self::LOG_PRFIX . "Prepare data before saving", [
            'user_id' => $this->orderData['user_id'] ?? self::USER_ID,
            'given' => $this->orderData,
            'ready' => $ready
        ]);
    }

    private function runJobs(int $orderId)
    {
        UpdateInventory::dispatch($orderId);
        OrderPaymentJob::dispatch($orderId);
    }

}
