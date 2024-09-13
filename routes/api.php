<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/cars/available-cars', [CarController::class, 'searchAPI']);
Route::post('/cars/{carId}/book', [CarController::class, 'placeBookingAPI']);


