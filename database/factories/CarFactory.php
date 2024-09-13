<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carModels = [
            'Toyota Corolla', 'Toyota Camry', 'Toyota RAV4',
            'Ford Mustang', 'Ford F-150', 'Ford Explorer',
            'BMW 3 Series', 'BMW X5', 'BMW 5 Series',
            'Audi A4', 'Audi Q5', 'Audi A6',
            'Mercedes C-Class', 'Mercedes E-Class', 'Mercedes GLE',
            'Honda Civic', 'Honda Accord', 'Honda CR-V',
            'Volkswagen Golf', 'Volkswagen Passat', 'Volkswagen Tiguan',
            'Chevrolet Camaro', 'Chevrolet Silverado', 'Chevrolet Tahoe',
            'Nissan Altima', 'Nissan Rogue', 'Nissan Sentra',
            'Tesla Model 3', 'Tesla Model S', 'Tesla Model X'
        ];

        return [
            'type' => fake()->randomElement($carModels),
            'logo' => 'https://loremflickr.com/350/216/car?random=' . rand(),
            'dailyCost' => fake()->numberBetween(20, 80)
        ];
    }
}
