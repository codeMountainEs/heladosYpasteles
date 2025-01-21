<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BreakfastTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Dulce', 'Salado', 'Especial', 'Fitness', 'Continental']),
            'description' => fake()->paragraph(),
        ];
    }
} 