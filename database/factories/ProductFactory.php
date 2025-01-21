<?php

namespace Database\Factories;

use App\Models\Bakery;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'bakery_id' => Bakery::factory(),
            'product_type_id' => ProductType::first()->id,
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 5, 50),
            'image' => fake()->imageUrl(640, 480, 'food')
        ];
    }
} 