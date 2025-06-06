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
        $other_products = Product::whereNotIn('id', $wishlists->pluck('product_id'))->paginate(20);

        return view('pages.costumer.wishlist', [
            'wishlists' => $wishlists,
            'other_products' => $other_products
        ]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        $newWishlist = Wishlist::create([
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);

        if ($newWishlist) {
            return redirect()->back()->with('show_toast', [
                'type' => 'success',
                'title' => 'Produk berhasil ditambahkan ke wishlist!',
                'duration' => 2000
            ]);
        }

        return redirect()->back()->with('show_toast', [
            'type' => 'error',
            'title' => 'Produk gagal ditambahkan ke wishlist!',
            'duration' => 2000
        ]);
    }

    public function destroy(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        $destroyWishlist = Wishlist::where('product_id', $product_id)->where('user_id', $user_id)->forceDelete();
        if ($destroyWishlist) {
            return redirect()->back()->with('show_toast', [
                'type' => 'success',
                'title' => 'Produk berhasil dihapus dari wishlist!',
                'duration' => 2000
            ]);
        }

        return redirect()->back()->with('show_toast', [
            'type' => 'error',
            'title' => 'Produk gagal dihapus dari wishlist!',
            'duration' => 2000
        ]);
    }
}
