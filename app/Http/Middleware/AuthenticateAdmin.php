<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah diautentikasi
        if (Auth::guard('admins')->check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan.');
    }
}
