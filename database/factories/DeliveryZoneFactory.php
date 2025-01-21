<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryZoneFactory extends Factory
{
    public function definition(): array
    {
        return [
            'postal_code' => fake()->postcode(),
            'city' => fake()->city(),
            'base_price' => fake()->randomFloat(2, 2, 5),
            'price_per_km' => fake()->randomFloat(2, 0.5, 1.5),
        ];
    }
} 