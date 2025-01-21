<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'delivery_street_address' => fake()->streetAddress(),
            'delivery_postal_code' => fake()->postcode(),
            'delivery_city' => fake()->city(),
            'delivery_province' => fake()->state(),
            'delivery_date' => fake()->dateTimeBetween('now', '+2 weeks'),
            'delivery_time' => fake()->dateTimeBetween('08:00:00', '11:00:00'),
            'total_amount' => 0, // Se calculará después
            'payment_method' => 'efectivo',
            'payment_status' => 'pendiente',
            'order_status' => 'pendiente',
            'notes' => fake()->optional()->text(),
        ];
    }
} 