<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimony;
use App\Models\TestimonyPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

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
            ImageOptimizer::optimize(public_path('storage/' . $imagePath));
        }

        $product = Product::where('slug', $slug)->first();
        $testimonyPermission = TestimonyPermission::where('product_id', $product->id)->where('user_id', Auth::user()->id)->first();

        $newTestimony = Testimony::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rate,
            'image' => $imagePath,
            'testimony' => $request->testimony,
            'is_featured' => 0
        ]);

        if ($newTestimony) {
            $testimonyPermission->update([
                'is_used' => 1
            ]);
            return redirect()->back()->with('show_toast', [
                'type' => 'success',
                'title' => 'Thank You! Testimoni berhasil dikirim!',
                'duration' => 2000
            ]);
        }

        return redirect()->back()->with('show_toast', [
            'type' => 'error',
            'title' => 'Testimoni gagal dikirim!',
            'duration' => 1500
        ]);
    }
}
