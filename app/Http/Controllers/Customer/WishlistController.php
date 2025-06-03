<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('general.auth.getsignin');
        }

        $user_id = Auth::user()->id;
        $wishlists = Wishlist::with('product')->where('user_id', $user_id)->get();
        $other_products = Product::all()->whereNotIn('id', $wishlists->pluck('product_id'));

        return view('pages.costumer.wishlist', [
            'wishlists' => $wishlists,
            'other_products' => $other_products
        ]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        Wishlist::create([
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->forceDelete();
        return redirect()->back();
    }
}
