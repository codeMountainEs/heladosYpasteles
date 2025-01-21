<?php

namespace Database\Seeders;

use App\Models\BreakfastType;
use Illuminate\Database\Seeder;

class BreakfastTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Dulce' => 'Desayunos con predominio de sabores dulces',
            'Salado' => 'Desayunos con predominio de sabores salados',
            'Especial' => 'Desayunos para ocasiones especiales',
            'Fitness' => 'Desayunos saludables y equilibrados',
            'Continental' => 'Desayunos de estilo europeo'
        ];

        foreach ($types as $name => $description) {
            BreakfastType::create([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }
} 