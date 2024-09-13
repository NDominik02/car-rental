<?php
use App\Models\Car;

it('displays available cars', function () {
    $car = Car::factory()->create();

    $startDate = now()->addDays()->toDateString();
    $endDate = now()->addDays(5)->toDateString();

    $response = $this->get("/search?start_date=$startDate&end_date=$endDate");

    $response->assertOk();
    $response->assertViewHas('availableCars');

    $availableCars = $response->viewData('availableCars');
    $carIds = $availableCars->pluck('id');

    expect($carIds->contains($car->id))->toBeTrue();
});

it('fails with invalid dates', function () {
    $startDate = now()->addDays(10)->toDateString();
    $endDate = now()->toDateString();

    $response = $this->get("/search?start_date=$startDate&end_date=$endDate");

    $response->assertStatus(302); // redirect
    $response->assertSessionHasErrors('end_date');
});

it('doesnt have cars for past dates ', function () {
    $startDate = now()->subDays(5)->toDateString();
    $endDate = now()->subDays()->toDateString();

    $response = $this->get("/search?start_date=$startDate&end_date=$endDate");

    $response->assertStatus(302);
    $response->assertSessionHasErrors(['start_date', 'end_date']);
});

