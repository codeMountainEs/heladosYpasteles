<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Pasteles',
            'Tartas',
            'Helados',
            'Desayunos'
        ];

        foreach ($types as $type) {
            ProductType::create(['name' => $type]);
        }
    }
} 