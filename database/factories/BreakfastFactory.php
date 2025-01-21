<?php

namespace Database\Factories;

use App\Models\BreakfastType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreakfastFactory extends Factory
{
    public function definition(): array
    {
        return [
            'breakfast_type_id' => BreakfastType::factory(),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'base_price' => fake()->randomFloat(2, 15, 50),
            'active' => true,
        ];
    }
} 