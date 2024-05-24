<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Survey;
use Illuminate\Support\Facades\Storage;

class FormulirController extends Controller
{
    public function index()
    {
        return view('auth.formulir');
    }

    public function daftar()
    {
        $visitors = Visitor::all();
        return view('view.daftar', compact('visitors'));
    }

    public function storeForm(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'asal_instansi' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
            'signature' => 'required',
        ]);
        
        // Simpan tanda tangan sebagai gambar di dalam folder public/signatures
        $signatureData = $request->input('signature');
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);
        $signatureImage = base64_decode($signatureData);
        $signaturePath = 'signatures/' . uniqid() . '.png'; // Menyimpan di folder public/signatures
        file_put_contents(public_path($signaturePath), $signatureImage);

        // Tambahkan path tanda tangan ke data yang divalidasi
        $validatedData['tanda_tangan'] = $signaturePath;
        // dd($validatedData);
        // Simpan data formulir
        Visitor::create($validatedData);

        return redirect('/Daftar-Tamu-Kunjungan')->with('success', 'Formulir telah berhasil disimpan.');
    }
}
