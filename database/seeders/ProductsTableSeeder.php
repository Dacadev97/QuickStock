<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usar el generador de datos Faker
        $faker = Faker::create();

        // Crear 20 productos de ejemplo
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'nombre_producto' => $faker->word,
                'referencia' => $faker->unique()->randomNumber(6),
                'precio' => $faker->randomNumber(4),
                'peso' => $faker->randomNumber(2),
                'categoria' => $faker->word,
                'stock' => $faker->randomNumber(2),
                'fecha_creacion' => $faker->dateTimeThisMonth,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
