<?php

namespace Database\Factories;

use App\Models\Breakfast;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreakfastImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'breakfast_id' => Breakfast::factory(),
            'image_path' => fake()->imageUrl(800, 600, 'food'),
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(),
        ];
    }
} 