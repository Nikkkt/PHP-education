<?php

namespace Nikit\SlimTest\Providers;

use Nikit\SlimTest\Support\View;
use Slim\Factory\Psr17\Psr17Factory;

class BladeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->getContainer()->set(
            View::class,
            fn() => new View($this->app->getResponseFactory())
        );
    }

    public function boot(): void
    {
    }
}