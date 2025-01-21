<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AllergenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Gluten', 'Lácteos', 'Huevos', 'Pescado', 'Cacahuetes',
                'Soja', 'Frutos secos', 'Apio', 'Mostaza', 'Sésamo'
            ]),
            'description' => fake()->sentence(),
            'image' => fake()->imageUrl(400, 400, 'food'),
        ];
    }
} 