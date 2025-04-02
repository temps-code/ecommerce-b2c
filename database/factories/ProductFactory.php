<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'price'       => $this->faker->randomFloat(2, 1, 100),
            'stock'       => $this->faker->numberBetween(0, 100),
            'image_path'  => $this->faker->imageUrl(640, 480, 'products'),
            'is_active'   => $this->faker->boolean(90),
        ];
    }
}
