<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
    
        // Lakukan autentikasi menggunakan guard 'admins'
        if (Auth::guard('admins')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::guard('admins')->user();
    
            // Pastikan autentikasi berhasil dan peran pengguna adalah 'admin' atau 'superadmin'
            if ($user && ($user->role === 'admin' || $user->role === 'superadmin')) {
                // Redirect sesuai peran pengguna
                if ($user->role === 'admin') {
                    return redirect()->route('dashboard'); // Redirect admin to their dashboard
                } elseif ($user->role === 'superadmin') {
                    return redirect()->route('dashboard_master'); // Redirect superadmin to their dashboard
                }
            }
        }
    
        // Jika autentikasi gagal atau peran tidak valid, kembali ke halaman login dengan pesan kesalahan
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
