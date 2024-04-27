<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Survey;

class FormulirController extends Controller
{
    public function index(){
        return view ('auth.formulir');
    }

    public function daftar(){
        $visitors = Visitor::all();
        return view ('view.daftar', compact('visitors'));
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
        ]);

        Visitor::create($validatedData);

        return redirect('/Daftar-Tamu-Kunjungan')->with('success', 'Formulir telah berhasil disimpan.');
    }
}
