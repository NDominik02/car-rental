<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'index']);

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/editor', [AdminController::class, 'editor']);
});

Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars/store', [CarController::class, 'store']);

Route::get('/cars/{car}', [CarController::class, 'show']);

Route::get('/cars/{car}/edit', [CarController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/cars/{car}', [CarController::class, 'update']);
Route::delete('/cars/{car}', [CarController::class, 'destroy']);


