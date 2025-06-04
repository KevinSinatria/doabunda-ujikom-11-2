<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category', 'images', 'testimonies')->latest();
        $search = '';

        if ($request->search) {
            $search = $request->search;
            $products->where('name', 'like', '%' . $search . '%');
        }

        return view('pages.general.product', [
            'products' => $products->paginate(20),
            'search' => $search
        ]);
    }

    public function show(Request $request, $slug)
    {
        $product = Product::with('category', 'images', 'testimonies')->where('slug', $slug)->first();
        $ratingAvg = $product->testimonies->avg('rating');
        $other_products = Product::with('category', 'images')->whereNotIn('id', [$product->id])->paginate(20);
        $isWishlist = false;
        $testimonies = Testimony::with('user')->where('product_id', $product->id)->paginate(3);

        if (Auth::check()) {
            $isWishlist = Auth::user()->wishlists->where('product_id', $product->id)->isNotEmpty();
        }

        return view('pages.general.product-detail', [
            'product' => $product,
            'other_products' => $other_products,
            'ratingAvg' => $ratingAvg,
            'isWishlist' => $isWishlist,
            'testimonies' => $testimonies
        ]);
    }
}
