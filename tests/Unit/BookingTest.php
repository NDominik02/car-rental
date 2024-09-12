<?php

use App\Models\Booking;
use App\Models\Car;

it('belongs to a car', function () {
    $car = Car::factory()->create();
    $booking = Booking::factory()->create([
        'car_id' => $car->id
    ]);

    expect($booking->car->is($car))->toBeTrue();
});
