<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather/{city1?}/{city2?}/{city3?}', [WeatherController::class, 'getWeather']);
