<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(4);
        return view ('view.elements', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validasi data jika diperlukan
          $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'asal_instansi' => 'required',
            'no_hp' => 'required',
            'tanggal' => 'required',
        ]);

        // Simpan data ke database
        $tamu = new Visitor; // Ganti Tamu dengan nama model Anda
        $tamu->nama = $request->nama;
        $tamu->alamat = $request->alamat;
        $tamu->keperluan = $request->keperluan;
        $tamu->asal_instansi = $request->asal_instansi;
        $tamu->no_hp = $request->no_hp;
        $tamu->tanggal = $request->tanggal;
        $tamu->save();

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function xlsx()
    {
        // return Excel::download(new TamuExport, 'users.xlsx');
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function cetakForm()
    {
        return view('tamu.cetak-tamu-form');
    }

    public function cetakTanggal($tanggalAwal, $tanggalAkhir)
    {
        $cetakPertanggal = Visitor::whereBetween('tanggal',[$tanggalAwal, $tanggalAkhir])->get();
        return view('tamu.cetak-tamu-tanggal', compact('cetakPertanggal'));
    }
}
