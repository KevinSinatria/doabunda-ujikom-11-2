<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $user = User::with('testimonies', 'wishlists')->find(Auth::user()->id);
        $wishlistsCount = $user->wishlists->count();
        $testimoniesCount = $user->testimonies->count();
        $accountAgeDiffInSeconds = $user->created_at->diffInSeconds(Carbon::now());

        $days = floor($accountAgeDiffInSeconds / (3600 * 24));
        $hours = floor(($accountAgeDiffInSeconds % (3600 * 24)) / 3600);
        $minutes = floor((($accountAgeDiffInSeconds % (3600 * 24)) % 3600) / 60);
        $seconds = floor((($accountAgeDiffInSeconds % (3600 * 24)) % 3600) % 60);

        $accountAge = [
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        ];

        return view('pages.general.my-profile', [
            'user' => $user,
            'wishlistsCount' => $wishlistsCount,
            'testimoniesCount' => $testimoniesCount,
            'accountAge' => $accountAge
        ]);
    }

    public function show($username)
    {
        $user = User::where('username', $username)->with('testimonies', 'wishlists')->first();
        $wishlistsCount = $user->wishlists->count();
        $testimoniesCount = $user->testimonies->count();
        $accountAgeDiffInSeconds = $user->created_at->diffInSeconds(Carbon::now());

        $days = floor($accountAgeDiffInSeconds / (3600 * 24));
        $hours = floor(($accountAgeDiffInSeconds % (3600 * 24)) / 3600);
        $minutes = floor((($accountAgeDiffInSeconds % (3600 * 24)) % 3600) / 60);
        $seconds = floor((($accountAgeDiffInSeconds % (3600 * 24)) % 3600) % 60);

        $accountAge = [
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        ];

        return view('pages.general.customer-profile', [
            'user' => $user,
            'wishlistsCount' => $wishlistsCount,
            'testimoniesCount' => $testimoniesCount,
            'accountAge' => $accountAge
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

        if ($request->password) {
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
