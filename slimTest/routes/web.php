<?php

global $app;

use Nikit\SlimTest\Http\Controllers\HomeController;
use Nikit\SlimTest\Support\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/{name}', [HomeController::class, 'show']);

//$app->get('/', [HomeController::class, 'index']);
/*Route::get('/', 'HomeController@index');
Route::get('/{name}', 'HomeController@show');*/