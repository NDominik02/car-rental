<?php

use App\Models\Car;

test('example', function () {
    expect(true)->toBeTrue();
});

it('loads the home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('has cars in db', function () {
    Car::factory()->create();

    $this->assertDatabaseCount('cars', 1);
});
