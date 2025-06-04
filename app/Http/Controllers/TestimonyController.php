<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function store(Request $request, $slug)
    {
        // $product = Product::where('slug', $slug)->first();

        // Testimony::create([
        //     'product_id' => $product->id,
        //     'user_id' => Auth::user()->id,
        //     'rating' => $request->rate,
        //     ''
        // ]);
    }
}
