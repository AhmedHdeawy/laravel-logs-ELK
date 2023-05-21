<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Services\PaymentService\PaymentServiceContract;

class OrderPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private int $orderId)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(PaymentServiceContract $paymentServiceContract): void
    {
        Log::alert("ORDER SERVICE :: Start order payment JOB", [
            'order_id' => $this->orderId
        ]);

        $paymentServiceContract->payment($this->orderId);
    }
}
