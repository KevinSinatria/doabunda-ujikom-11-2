<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class GeneralPageController extends Controller
{
    public function homepage()
    {
        $testimonies = Testimony::with('user')->where('is_featured', 1)->latest()->get();
        return view('pages.index', [
            'testimonies' => $testimonies
        ]);
    }

    public function about()
    {
        return view('pages.general.about');
    }

    public function contact()
    {
        return view('pages.general.contact');
    }
}
