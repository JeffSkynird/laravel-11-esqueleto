<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SinglentonService;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(SinglentonService::class, function ($app) {
            return new SinglentonService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
