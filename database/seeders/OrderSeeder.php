<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Breakfast;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        $breakfast = Breakfast::inRandomOrder()->first();

        // Crear 5 órdenes con diferentes cantidades de personas
        $quantities = [1, 3, 5, 8, 12]; // Para probar diferentes niveles de descuento

        foreach ($quantities as $index => $quantity) {
            $order = Order::factory()->create([
                'customer_id' => $customers[$index]->id
            ]);

            // Crear el item del pedido con el desayuno y la cantidad especificada
            $orderItem = OrderItem::factory()->create([
                'order_id' => $order->id,
                'breakfast_id' => $breakfast->id,
                'quantity' => $quantity,
            ]);

            // Actualizar el total de la orden
            $order->update([
                'total_amount' => $orderItem->subtotal
            ]);
        }
    }
} 