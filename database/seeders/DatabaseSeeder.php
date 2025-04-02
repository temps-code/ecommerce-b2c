<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Llamar al seeder de usuarios
        $this->call(UserSeeder::class);

        // Llamar a los seeders de categorías, productos, carrito, etc.
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ShoppingCartSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(SaleDetailSeeder::class);
    }
}
