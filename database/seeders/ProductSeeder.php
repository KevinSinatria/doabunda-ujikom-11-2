<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newProducts = Product::factory(150)->create();

        foreach ($newProducts as $product) {
            //     $imageCount = rand(1, 3);

            ProductImage::factory()->create([
                'product_id' => $product->id
            ]);
        }
    }
}
