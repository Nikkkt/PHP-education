<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        ValidationException::class,
    ];

    public function register(): void
    {
        $this->renderable(function (ValidationException $e, $request) {
            return $e->render($request);
        });
    }
}
