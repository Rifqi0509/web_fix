<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfileExport;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Admin::orderBy('created_at', 'desc')->paginate(6);
        return view ('view.profile', compact('profiles'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data yang masuk
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'role' => 'required|string|max:255',
        'password' => 'required|string|min:8', // Atur aturan validasi sesuai kebutuhan
    ]);

    // Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);

    // Simpan data admin dengan password yang di-hash
    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $hashedPassword, // Simpan password yang sudah di-hash
    ]);

    // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
    return redirect()->route('profile.index')->with('success', 'Data berhasil disimpan!');
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
        $profiles = Admin::findOrFail($id);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return view('profile.edit', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profiles = Admin::findOrFail($id);

        $profiles->update($request->all());

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('profile.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profiles = Admin::findOrFail($id);
        $profiles->delete();
    
        return redirect()->route('profile.index')->with('success', 'Profil berhasil dihapus!');
    }

    public function cetak(){
        $profiles = Admin::all();
        return view ('rekap.cetak-profile', compact('profiles'));
    }

    public function xlsx()
    {
        return Excel::download(new ProfileExport, 'profile.xlsx');
    }
}
