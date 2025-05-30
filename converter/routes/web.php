<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/convert', [CurrencyController::class, 'convert']);
