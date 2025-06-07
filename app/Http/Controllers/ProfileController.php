<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.general.my-profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $user->update([
            'username' => $request->username ?? $user->username,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ]);

        if($request->password) {
            Auth::logout();
            return redirect()->route('general.auth.signin')->with('show_toast', [
                'type' => 'success',
                'title' => 'Profile dan password berhasil diupdate! Silahkan login kembali!'
            ]);
        }

        return redirect()->route('general.profile')->with('show_toast', [
            'type' => 'success',
            'title' => 'Profile berhasil diupdate!'
        ]);
    }
}
