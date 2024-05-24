<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vip;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        $user = Auth::guard('admins')->user();
        return view('view.dashboard');
    }

    public function superadmin()
    {
        $user = Auth::guard('admins')->user();
        return view('master.superadmin');
    }

    public function codevip(Request $request)
    {
        if ($request->isMethod('post')) {
            $kode = $request->input('kode');
            $vip = Vip::where('kd_undangan', $kode)->first();

            if ($vip) {
                // If the code is found, redirect to the verification route with kd_ruangan
                return redirect()->route('verifikasi', ['kd_undangan' => $vip->kd_undangan]);
            } else {
                // If the code is not found, return with an error message
                return redirect()->back()->with('error', 'Kode undangan tidak valid');
            }
        }

        return view('view.vipcode');
    }

    public function tabler()
    {
        return view('view.tables');
    }

    public function struktur()
    {
        return view('view.strukturorganisasi');
    }
}
