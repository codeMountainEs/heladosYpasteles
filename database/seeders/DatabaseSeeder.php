<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Bakery;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BakeryImage;
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
            'name' => 'admin',
            'email' => 'admin@admin.com',
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

            // Crear 5 imágenes para cada pastelería
            BakeryImage::factory()
                ->count(5)
                ->create([
                    'bakery_id' => $bakery->id,
                    'title' => "Imagen " . fake()->words(3, true),
                    'description' => fake()->paragraph(),
                ]);

            // Crear 10 productos de cada tipo para cada pastelería
            foreach (ProductType::all() as $type) {
                $products = Product::factory()
                    ->count(10)
                    ->create([
                        'bakery_id' => $bakery->id,
                        'product_type_id' => $type->id,
                    ]);

                // Crear 3 imágenes adicionales para cada producto
                foreach ($products as $product) {
                    ProductImage::factory()
                        ->count(3)
                        ->create([
                            'product_id' => $product->id
                        ]);
                }
            }
        }
    }
}
