<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitorExport;

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
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keperluan' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'no_hp' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
            'tanggal' => 'required|date',
        ]);
    
        // Simpan data ke database
        Visitor::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'asal_instansi' => $request->asal_instansi,
            'no_hp' => $request->no_hp,
            'tanggal' => $request->tanggal,
        ]);

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
        
        return Excel::download(new VisitorExport, 'visitor.xlsx');
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

    public function getAllVisitorNames()
{
    $visitorNames = Visitor::pluck('nama')->toArray();
    return response()->json($visitorNames);
}
}
