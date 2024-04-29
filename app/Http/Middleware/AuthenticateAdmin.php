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
        $user = Auth::guard('admins')->user();

            if ($user && $user->role === 'admin') {
                return $next($request);
        }
        
        return abort(404, 'Not Found.');
    }
}
