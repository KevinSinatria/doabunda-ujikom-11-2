<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimony;
use App\Models\TestimonyPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    public function store(Request $request, $slug)
    {
        $validated = $request->validate([
            'rate' => 'required|numeric|min:1|max:5',
            'testimony' => 'required|string|min:20|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!$validated) {
            return redirect()->back()->with('error', 'Testimoni gagal dikirim');
        }

        $imagePath = null;

        if ($request->hasFile('image')) {
            // Auto generate filename
            $filename = $request->file('image')->hashName() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('assets/images/testimonies', $filename, 'public');
        }

        $product = Product::where('slug', $slug)->first();
        $testimonyPermission = TestimonyPermission::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();

        dd($testimonyPermission);

        Testimony::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rate,
            'image' => $imagePath,
            'testimony' => $request->testimony,
            'is_featured' => 0
        ]);

        $testimonyPermission->update([
            'is_used' => 1
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil dikirim');
    }
}
