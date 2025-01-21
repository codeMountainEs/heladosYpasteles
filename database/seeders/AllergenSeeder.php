<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    public function run(): void
    {
        $allergens = [
            'Gluten' => 'Presente en trigo, cebada, centeno y avena',
            'Lácteos' => 'Incluye leche y derivados',
            'Huevos' => 'Huevos y productos a base de huevos',
            'Frutos secos' => 'Incluye almendras, nueces, avellanas',
            'Soja' => 'Soja y productos a base de soja',
            'Pescado' => 'Pescado y productos a base de pescado',
            'Crustáceos' => 'Gambas, langostinos, cangrejos',
            'Moluscos' => 'Almejas, mejillones, calamares',
            'Apio' => 'Apio y derivados',
            'Mostaza' => 'Mostaza y productos derivados'
        ];

        foreach ($allergens as $name => $description) {
            Allergen::create([
                'name' => $name,
                'description' => $description,
                'image' => fake()->imageUrl(400, 400, 'food')
            ]);
        }
    }
} 