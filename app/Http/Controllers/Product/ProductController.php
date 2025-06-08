<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::all();
        $search = '';
        $filterCategory = '';
        $categoryIsNotFound = false;

        if ($request->search) {
            $search = $request->search;
            $products->where('name', 'like', '%' . $search . '%');
        }

        if ($request->category) {
            $filterCategory = $request->category;
            if ($filterCategory == 'all') {
                $filterCategory = '';
            }

            $category = Category::where('name', $filterCategory)->first();
            if ($category) {
                $products->where('category_id', $category->id);
            } else {
                if ($request->category != 'all') {
                    $categoryIsNotFound = true;
                }
            }
        }

        return view('pages.general.product', [
            'products' => $products->paginate(20),
            'search' => $search,
            'categories' => $categories,
            'filterCategory' => $filterCategory,
            'categoryIsNotFound' => $categoryIsNotFound
        ]);
    }

    public function show(Request $request, $slug)
    {
        $product = Product::with('category', 'images', 'testimonies')->where('slug', $slug)->first();
        $ratingAvg = $product->testimonies->avg('rating');
        $other_products = Product::with('category', 'images')->whereNotIn('id', [$product->id])->latest()->paginate(20);
        $isWishlist = false;
        $testimonies = Testimony::with('user')->where('product_id', $product->id)->latest()->paginate(3);
        $isTestimonyAllowed = Auth::check() && Auth::user()->role == 'customer' && Auth::user()->testimonyPermissions->where('product_id', $product->id)->count() > 0 && Auth::user()->testimonyPermissions->where('product_id', $product->id)->where('is_used', 0)->count() > 0;

        if (Auth::check()) {
            $isWishlist = Auth::user()->wishlists->where('product_id', $product->id)->isNotEmpty();
        }

        return view('pages.general.product-detail', [
            'product' => $product,
            'other_products' => $other_products,
            'ratingAvg' => $ratingAvg,
            'isWishlist' => $isWishlist,
            'testimonies' => $testimonies,
            'isTestimonyAllowed' => $isTestimonyAllowed
        ]);
    }
}
