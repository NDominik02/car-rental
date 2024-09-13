<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);
Route::get('/search', [CarController::class, 'search']);

Route::get('/cars/{car}', [CarController::class, 'show']);
Route::post('/cars/{car}/book', [CarController::class, 'placeBooking']);

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/create', [CarController::class, 'create']);
    Route::post('/admin/store', [CarController::class, 'store']);

    Route::get('/admin/editor', [AdminController::class, 'editor']);
    Route::get('/admin/editor/{car}', [AdminController::class, 'show']);

    Route::put('/admin/editor/{car}', [AdminController::class, 'update']);
});

