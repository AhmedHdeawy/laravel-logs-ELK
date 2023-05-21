<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Services\InventoryService\InventoryServiceContract;

class UpdateInventory implements ShouldQueue
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
    public function handle(InventoryServiceContract $inventoryServiceContract): void
    {
        Log::alert("ORDER SERVICE :: Start update inventory JOB", [
            'order_id' => $this->orderId
        ]);

        $inventoryServiceContract->updateTheInventory($this->orderId);
    }
}
