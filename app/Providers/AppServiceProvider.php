<?php

namespace App\Providers;

use App\Services\GptService;
use App\Services\Parsers\ChPrecisionParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GptService::class, function ($app) {
            return new GptService();
        });

        $this->app->singleton(ChPrecisionParser::class, function ($app) {
            return new ChPrecisionParser();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
