<?php

namespace Database\Seeders;

use App\Models\Bakery;
use App\Models\BakeryImage;
use App\Models\Company;
use Illuminate\Database\Seeder;

class BakerySeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();

        // Crear 3 pastelerías
        for ($i = 1; $i <= 3; $i++) {
            $bakery = Bakery::create([
                'company_id' => $company->id,
                'name' => "Pastelería $i",
                'description' => "Descripción de la pastelería $i",
                'address' => fake()->address(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email(),
            ]);

            // Crear 5 imágenes para cada pastelería
            BakeryImage::factory()
                ->count(5)
                ->create([
                    'bakery_id' => $bakery->id,
                    'title' => "Imagen " . fake()->words(3, true),
                    'description' => fake()->paragraph(),
                ]);
        }
    }
} 