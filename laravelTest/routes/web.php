<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/language/{locale}', [LanguageController::class, 'changeLanguage']);

Route::get('/main', function () {
    return view('index');
});

Route::resource('products', ProductController::class);
