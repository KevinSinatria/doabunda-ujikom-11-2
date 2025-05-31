<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_id = Product::get('id');
        return [
            'product_id' => fake()->randomElement($product_id),
            'image_path' => 'https://placehold.co/400x400?text=Hello+World',
        ];
    }
}
