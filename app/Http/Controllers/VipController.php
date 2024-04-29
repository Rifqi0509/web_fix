<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Vip;
use App\Exports\VipExport;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vips = Vip::orderBy('created_at', 'desc')->paginate(10);
        return view ('view.vip', compact('vips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validasi data yang masuk
    $request->validate([
        'undangan' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'keperluan' => 'required|string|max:255',
        'asal_instansi' => 'required|string|max:255',
        'no_hp' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
        'tanggal' => 'required|date',
    ]);

    // Simpan data ke database
    Vip::create([
        'undangan' => $request->undangan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'keperluan' => $request->keperluan,
        'asal_instansi' => $request->asal_instansi,
        'no_hp' => $request->no_hp,
        'tanggal' => $request->tanggal,
    ]);

    // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
    return redirect()->route('vip.index')->with('success', 'Data berhasil disimpan!');
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
        return Excel::download(new VipExport, 'vip.xlsx');
    }

    public function cetakForm()
    {
        return view('vip.cetak-vip-form');
    }

    public function cetakTanggal($tanggalAwal, $tanggalAkhir)
    {
        $cetakPertanggal = Vip::whereBetween('tanggal',[$tanggalAwal, $tanggalAkhir])->get();
        return view('vip.cetak-vip-tanggal', compact('cetakPertanggal'));
    }

    public function getAllVipNames()
    {
        $vipNames = Vip::pluck('nama')->toArray();
        return response()->json($vipNames);
    }
}
