<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'is_active'   => $this->faker->boolean(90),
        ];
    }
}
