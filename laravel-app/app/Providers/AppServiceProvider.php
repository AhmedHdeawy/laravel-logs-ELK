<?php

namespace App\Providers;

use App\Services\InventoryService\InventoryServiceConcrete;
use App\Services\InventoryService\InventoryServiceContract;
use App\Services\OrderService\OrderServiceConcrete;
use App\Services\OrderService\OrderServiceContract;
use App\Services\PaymentService\PaymentServiceConcrete;
use App\Services\PaymentService\PaymentServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public array $bindings = [
        OrderServiceContract::class => OrderServiceConcrete::class,
        InventoryServiceContract::class => InventoryServiceConcrete::class,
        PaymentServiceContract::class => PaymentServiceConcrete::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
