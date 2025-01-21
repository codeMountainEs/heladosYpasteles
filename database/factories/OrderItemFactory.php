<?php

namespace Database\Factories;

use App\Models\Breakfast;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        $breakfast = Breakfast::inRandomOrder()->first();
        $quantity = fake()->numberBetween(1, 12);
        $unit_price = $breakfast->base_price;
        $discount_percentage = $this->calculateDiscountPercentage($quantity);
        $discounted_unit_price = $unit_price * (1 - ($discount_percentage / 100));
        $subtotal = $quantity * $discounted_unit_price;

        return [
            'order_id' => Order::factory(),
            'breakfast_id' => $breakfast->id,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'discount_percentage' => $discount_percentage,
            'discounted_unit_price' => $discounted_unit_price,
            'subtotal' => $subtotal,
        ];
    }

    private function calculateDiscountPercentage(int $quantity): float
    {
        return match(true) {
            $quantity >= 10 => 15.0,
            $quantity >= 5 => 10.0,
            $quantity >= 3 => 5.0,
            default => 0.0,
        };
    }
} 