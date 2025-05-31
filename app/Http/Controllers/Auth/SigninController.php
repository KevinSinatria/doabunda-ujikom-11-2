<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function showSigninForm()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('general.home');
            }
        }
        return view('auth.signin');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('filament.admin.pages.dashboard');
            } else {
                return redirect()->route('general.home');
            }
        }

        return back()->withErrors([
            'email' => "Email atau password salah"
        ])->onlyInput('email');
    }

    public function signout() {
        Auth::logout();
        return redirect()->route('general.home');
    }
}
