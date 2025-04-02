<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleDetailFactory extends Factory
{
    protected $model = \App\Models\SaleDetail::class;

    public function definition(): array
    {
        $unitPrice = $this->faker->randomFloat(2, 1, 100);
        return [
            // Eliminamos la creación automática de 'sale_id' para que se asocie a ventas reales
            // 'sale_id'    => Sale::factory(),
            'product_id' => Product::factory(),
            'quantity'   => $this->faker->numberBetween(1, 5),
            'unit_price' => $unitPrice,
            'is_active'  => $this->faker->boolean(90),
        ];
    }
}
