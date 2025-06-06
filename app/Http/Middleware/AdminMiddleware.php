<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('general.auth.getsignin')->with('show_toast', [
                'type' => 'error',
                'title' => 'Silahkan login terlebih dahulu!'
            ]);
        }

        if (Auth::user()->role != 'admin') {
            return redirect()->route('general.auth.getsignin')->with('show_toast', [
                'type' => 'error',
                'title' => 'Silahkan login sebagai admin terlebih dahulu!'
            ]);
        }
        
        return $next($request);
    }
}
