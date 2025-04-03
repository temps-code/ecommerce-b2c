<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        // Conjunto de imágenes existentes en public/storage/products
        $images = ['product1.jpg', 'product2.jpg', 'product3.jpg'];

        return [
            'category_id' => Category::factory(),
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'price'       => $this->faker->randomFloat(2, 1, 100),
            'stock'       => $this->faker->numberBetween(0, 100),
            // Se guarda la ruta completa relativa para acceder mediante asset('storage/...'):
            'image_path'  => 'products/' . $this->faker->randomElement($images),
            'is_active'   => $this->faker->boolean(90),
        ];
    }
}
