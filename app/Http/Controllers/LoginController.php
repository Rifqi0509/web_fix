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
        

        if (Auth::guard('admins')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $user = Auth::guard('admins')->user();
        if ($user->role === 'admin') {
            return redirect()->route('dashboard'); // Redirect master user to master dashboard
        } elseif ($user->role === 'superadmin') {
            return redirect()->route('dashboard_master'); // Redirect admin desa to their dashboard
        }
        // Default redirect for other roles
        return redirect()->route('view.dashboard');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
