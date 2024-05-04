<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfileExport;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Admin::orderBy('created_at', 'desc')->paginate(6);
        return view ('view.profile', compact('profiles'));
    
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
{
    // Validasi data yang masuk
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'role' => 'required|string|max:255',
        'password' => 'required|string|min:8',
    ]);

    // Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);

    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $hashedPassword,
    ]);

    
    return redirect()->route('profile.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $profiles = Admin::findOrFail($id);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return view('profile.edit', compact('profiles'));
    }

    public function update(Request $request, string $id)
    {
        $profiles = Admin::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$profiles->id,
            'role' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', 
        ]);

        $profiles->name = $request->name;
        $profiles->email = $request->email;
        $profiles->role = $request->role;
        if ($request->password) {
            $profiles->password = Hash::make($request->password);
        }
        $profiles->save();

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

    public function getAllProfileNames()
    {
        $profileNames = Admin::pluck('nama')->toArray();
        return response()->json($profileNames);
    }
}
