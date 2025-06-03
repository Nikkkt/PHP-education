<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', [GreetingController::class, 'index'])->name('greeting');
Route::get('/lang/{locale}', [GreetingController::class, 'setLocale'])->name('set-locale');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
