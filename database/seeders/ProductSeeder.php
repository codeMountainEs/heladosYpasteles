<?php

namespace Database\Seeders;

use App\Models\Bakery;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $bakeries = Bakery::all();
        $types = ProductType::all();

        foreach ($bakeries as $bakery) {
            // Crear 10 productos de cada tipo para cada pastelería
            foreach ($types as $type) {
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