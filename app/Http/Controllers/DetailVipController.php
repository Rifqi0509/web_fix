<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vip;
use Illuminate\Support\Facades\Storage;

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
    public function submitSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required',
        ]);

        $vipId = $request->input('vip_id');
        $signatureData = $request->input('signature');

        // Menghapus header data URL dan mengganti spasi dengan '+'
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);

        // Decode data base64
        $signatureImage = base64_decode($signatureData);

        // Buat path unik untuk file tanda tangan
        $signaturePath = 'signatures/' . uniqid() . '.png';

        // Simpan file ke direktori public/signatures
        file_put_contents(public_path($signaturePath), $signatureImage);

        // Temukan VIP dan perbarui path tanda tangan
        $vip = VIP::findOrFail($vipId);
        $vip->tanda_tangan = $signaturePath;
        $vip->save();

        return redirect('/')->with('success', 'Signature saved successfully.');
    }
}
