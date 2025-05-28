<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralPageController extends Controller
{
    public function homepage() {
        return view('pages.index');
    }

    public function about() {
        return view('pages.general.about');
    }

    public function contact() {
        return view('pages.general.contact');
    }
}
