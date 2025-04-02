<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingCartFactory extends Factory
{
    protected $model = \App\Models\ShoppingCart::class;

    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'product_id' => Product::factory(),
            'quantity'   => $this->faker->numberBetween(1, 5),
            'is_active'  => $this->faker->boolean(90),
        ];
    }
}
