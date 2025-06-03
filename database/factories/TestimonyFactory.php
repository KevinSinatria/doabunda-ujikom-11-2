<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimony>
 */
class TestimonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::get('id');
        $product_id = Product::get('id');

        return [
            'user_id' => fake()->randomElement($user_id),
            'product_id' => fake()->randomElement($product_id),
            'testimony' => fake()->sentence('20'),
            'rating' => fake()->numberBetween(3, 5),
            'image' => 'assets/images/products/400-400-placeholder.svg',
            'is_featured' => fake()->boolean(),
        ];
    }
}
