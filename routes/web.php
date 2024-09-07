<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/cars/create', function (){
    return view('cars.create');
});

Route::get('/bookings', function (){
    return view('bookings');
});
