<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        $car = Car::factory()->create();
        $startDate = $this->faker->dateTimeBetween('now', '+1 month');
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 month');
        $numOfDays = (int) Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate)) +1;
//        TODO - ugyanazt az autót itt se lehessen egy időben többször bérelni
        return [
            'car_id' => $car->id,
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'numOfDays' => $numOfDays,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'cost' => $car->dailyCost * $numOfDays
        ];
    }
}
