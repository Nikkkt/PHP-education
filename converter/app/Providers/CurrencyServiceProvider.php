<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CurrencyConverter;

class CurrencyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CurrencyConverter::class, function ($app) {
            return new CurrencyConverter();
        });

        $this->app->alias(CurrencyConverter::class, 'currency');
    }
}
