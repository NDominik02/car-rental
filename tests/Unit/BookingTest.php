<?php

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

it('belongs to a car', function () {
    $car = Car::factory()->create();
    $booking = Booking::factory()->create([
        'car_id' => $car->id
    ]);

    expect($booking->car->is($car))->toBeTrue();
});

it('fails with invalid booking data', function () {
    $car = Car::factory()->create();

    $response = $this->withoutMiddleware()
        ->post("/cars/{$car->id}/book", [
            'name' => '',
            'email' => 'invalid-email',
            'address' => '',
            'phone' => 'invalid-phone'
        ]);

    $response->assertStatus(302);
    $response->assertSessionHasErrors(['name', 'email', 'address', 'phone']);
});

//it('creates booking with valid data and numOfDays', function () {
//    $car = Car::factory()->create();
//    $startDate = now()->format('Y-m-d');
//    $endDate = now()->addDays(2)->format('Y-m-d');
//
//    $numOfDays = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) + 1;
//
//    $response = $this->withoutMiddleware()
//        ->post("/cars/{$car->id}/book", [
//            'name' => 'Dominik',
//            'email' => 'nemethdominik02@gmail.com',
//            'address' => 'Budapest',
//            'phone' => '06307584957',
//            'start_date' => $startDate,
//            'end_date' => $endDate,
//            'numOfDays' => $numOfDays
//        ]);
//
//    $response->assertStatus(200);
//    expect(Booking::where('car_id', $car->id)->exists())->toBeTrue();
//});

