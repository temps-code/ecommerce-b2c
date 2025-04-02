<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = \App\Models\Sale::class;

    public function definition(): array
    {
        return [
            'user_id'   => User::factory(),
            // Eliminamos el campo 'total'
            'sale_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'is_active' => $this->faker->boolean(90),
        ];
    }
}
