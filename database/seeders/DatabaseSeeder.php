<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Bakery;
use App\Models\ProductType;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crear la compañía
        $company = Company::create([
            'name' => 'Pastelerías Deliciosas',
            'description' => 'Red de pastelerías artesanales',
        ]);

        // Crear tipos de productos
        $types = [
            'Pasteles',
            'Tartas',
            'Helados',
            'Desayunos'
        ];

        foreach ($types as $type) {
            ProductType::create(['name' => $type]);
        }

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

            // Crear 10 productos de cada tipo para cada pastelería
            foreach (ProductType::all() as $type) {
                Product::factory()
                    ->count(10)
                    ->create([
                        'bakery_id' => $bakery->id,
                        'product_type_id' => $type->id,
                    ]);
            }

            // Agregar 5 imágenes para cada pastelería
            \App\Models\BakeryImage::factory()
                ->count(5)
                ->create([
                    'bakery_id' => $bakery->id
                ]);
        }
    }
}
