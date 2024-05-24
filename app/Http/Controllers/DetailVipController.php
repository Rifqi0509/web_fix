<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vip;

class DetailVipController extends Controller
{
    public function verifikasi(Request $request)
    {
        $kd_undangan = $request->query('kd_undangan');
        $vips = Vip::where('kd_undangan', $kd_undangan)->orderBy('created_at', 'desc')->paginate(10);

        if ($vips->isEmpty()) {
            // If no records are found, redirect back with an error message
            return redirect()->back()->with('error', 'Tidak ada data untuk kode undangan tersebut.');
        }

        return view('view.detailvip', compact('vips', 'kd_undangan'));
    }
}
