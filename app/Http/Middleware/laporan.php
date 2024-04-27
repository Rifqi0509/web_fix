<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class laporan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('laporan')->check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->route('login')->with('error', 'Silakan login untuk masuk sesuai prosedur');
    
    }
}
