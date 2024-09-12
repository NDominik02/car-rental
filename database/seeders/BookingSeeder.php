<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::factory()->count(10)->state(['isActive' => true])->create();
        Car::factory()->count(10)->state(['isActive' => false])->create();

        Booking::factory()
            ->count(20)
            ->state(new Sequence(
                fn() => ['car_id' => Car::where('isActive', true)->inRandomOrder()->first()->id]
            ))
            ->create();
    }
}
