<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $numOfDays = fake()->numberBetween(1, 30);
        $car = Car::factory()->create();
        return [
            'name' => fake()->name(),
            'car_id' => $car->id,
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'numOfDays' => $numOfDays,
            'cost' => $car->dailyCost * $numOfDays
        ];
    }
}
