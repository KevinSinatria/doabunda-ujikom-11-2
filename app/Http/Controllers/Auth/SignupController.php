<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('general.home');
            }
        }

        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('username', $request->username)->exists()) {
            session()->flash('show_toast', [
                'type' => 'error',
                'title' => 'Username sudah terdaftar'
            ]);
            return redirect()->back();
        }

        if (User::where('email', $request->email)->exists()) {
            session()->flash('show_toast', [
                'type' => 'error',
                'title' => 'Email sudah terdaftar'
            ]);
            return redirect()->back();
        }

        User::create([
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'role' => 'customer',
        ]);

        session()->flash('show_toast', [
            'type' => 'success',
            'title' => 'Berhasil daftar! Silahkan signin!'
        ]);

        return redirect()->route('general.auth.getsignin');
    }
}
