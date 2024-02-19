<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CalculationService;

class CalculationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CalculationService::class, function ($app) {
            return new CalculationService();
        });
    }
}
