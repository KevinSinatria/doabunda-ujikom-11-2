<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images', 'testimonies')->get();
        return view('pages.general.product', [
            'products' => $products
        ]);
    }

    public function show($slug)
    {
        $product = Product::with('category', 'images', 'testimonies')->where('slug', $slug)->first();
        $ratingAvg = $product->testimonies->avg('rating');
        $other_products = Product::all()->whereNotIn('id', $product->id);

        return view('pages.general.product-detail', [
            'product' => $product,
            'other_products' => $other_products,
            'ratingAvg' => $ratingAvg
        ]);
    }
}
