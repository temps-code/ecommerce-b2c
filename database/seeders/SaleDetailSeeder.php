<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Seeder;

class SaleDetailSeeder extends Seeder
{
    public function run(): void
    {
        // Para cada venta existente, creamos entre 1 y 5 detalles
        $sales = Sale::all();
        foreach ($sales as $sale) {
            $details = SaleDetail::factory()->count(rand(1, 5))->make();
            $sale->saleDetails()->saveMany($details);
        }
    }
}
