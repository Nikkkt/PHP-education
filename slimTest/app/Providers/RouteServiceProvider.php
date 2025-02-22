<?php

namespace  Nikit\SlimTest\Providers;

use  Nikit\SlimTest\Support\Route;

class RouteServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        Route::setup($this->app);
    }

    public function boot(): void
    {
        $app = $this->app;
        require_once routes_path('web.php');
    }
}