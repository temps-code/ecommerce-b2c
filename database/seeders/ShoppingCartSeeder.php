<?php

namespace Database\Seeders;

use App\Models\ShoppingCart;
use Illuminate\Database\Seeder;

class ShoppingCartSeeder extends Seeder
{
    public function run(): void
    {
        // Crea 30 registros de carrito de compra
        ShoppingCart::factory()->count(30)->create();
    }
}
