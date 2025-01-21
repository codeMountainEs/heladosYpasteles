<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'image_path' => fake()->imageUrl(800, 600, 'food'),
            'description' => fake()->sentence(),
        ];
    }
} 