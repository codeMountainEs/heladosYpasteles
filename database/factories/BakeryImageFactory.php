<?php

namespace Database\Factories;

use App\Models\Bakery;
use Illuminate\Database\Eloquent\Factories\Factory;

class BakeryImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'bakery_id' => Bakery::factory(),
            'image_path' => fake()->imageUrl(800, 600, 'bakery'),
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
        ];
    }
} 