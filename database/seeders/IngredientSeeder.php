<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Allergen;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = Ingredient::factory(20)->create();
        $allergens = Allergen::all();

        foreach ($ingredients as $ingredient) {
            $ingredient->allergens()->attach(
                $allergens->random(rand(0, 3))->pluck('id')->toArray()
            );
        }
    }
} 