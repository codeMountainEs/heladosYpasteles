<?php

namespace Database\Seeders;

use App\Models\Breakfast;
use App\Models\BreakfastType;
use App\Models\Ingredient;
use App\Models\BreakfastImage;
use Illuminate\Database\Seeder;

class BreakfastSeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = Ingredient::all();

        foreach (BreakfastType::all() as $type) {
            $breakfasts = Breakfast::factory(5)
                ->create(['breakfast_type_id' => $type->id]);

            foreach ($breakfasts as $breakfast) {
                // Agregar ingredientes aleatorios a cada desayuno
                $breakfast->ingredients()->attach(
                    $ingredients->random(rand(3, 6))->pluck('id')->toArray(),
                    [
                        'quantity' => rand(1, 5),
                        'unit' => fake()->randomElement(['unidad', 'gr', 'ml'])
                    ]
                );

                // Crear imágenes para cada desayuno
                BreakfastImage::factory(3)->create([
                    'breakfast_id' => $breakfast->id
                ]);
            }
        }
    }
} 