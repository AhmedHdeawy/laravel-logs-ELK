<?php

namespace App\Providers;

use App\Services\OrderService\OrderServiceConcrete;
use App\Services\OrderService\OrderServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public array $bindings = [
        OrderServiceContract::class => OrderServiceConcrete::class
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
