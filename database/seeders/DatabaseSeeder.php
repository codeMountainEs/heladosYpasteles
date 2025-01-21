<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario administrador
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        // Crear la compañía
        $company = \App\Models\Company::create([
            'name' => 'Pastelerías Deliciosas',
            'description' => 'Red de pastelerías artesanales',
        ]);

        // Seeders de la funcionalidad de pastelerías
        $this->call([
            \Database\Seeders\ProductTypeSeeder::class,
            \Database\Seeders\BakerySeeder::class,
            \Database\Seeders\ProductSeeder::class,
        ]);

        // Seeders de la funcionalidad de desayunos
        $this->call([
            BreakfastTypeSeeder::class,    // Primero los tipos de desayuno
            AllergenSeeder::class,         // Luego los alérgenos
            IngredientSeeder::class,       // Después los ingredientes (que necesitan alérgenos)
            BreakfastSeeder::class,        // Luego los desayunos (necesitan tipos e ingredientes)
            DeliveryZoneSeeder::class,     // Finalmente las zonas de entrega
        ]);
    }
}
