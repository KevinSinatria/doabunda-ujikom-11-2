<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

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
                Notification::make()
                    ->title('Berhasil login!')
                    ->body('Selamat datang admin ' . Auth::user()->username . '!')
                    ->success()
                    ->send();
                return redirect()->route('filament.admin.pages.dashboard');
            } else {
                session()->flash('show_toast', [
                    'type' => 'success',
                    'title' => 'Selamat datang ' . Auth::user()->username . '!'
                ]);
                return redirect()->route('general.home');
            }
        }

        return redirect()->back()->with('show_toast', [
            'type' => 'error',
            'title' => 'Username atau password salah!'
        ]);
    }

    public function signout()
    {
        Auth::logout();
        session()->flash('show_toast', [
            'type' => 'success',
            'title' => 'Berhasil logout!',
            'duration' => 1500
        ]);

        return redirect()->route('general.home');
    }

}
