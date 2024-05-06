<?php

namespace App\Http\Controllers;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'desc')->paginate(6);
        
        return view ('view.akun_vip', compact('users'));
    }

    public function create()
    {
        return view('akun_vip.create');
    }

    
    public function store(Request $request)
    {
         // Validasi data yang masuk
        $request->validate([
        'username' => 'required|string|max:255',   
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'alamat' => 'required|string|max:255',
        'no_telepon' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
        'tanggal_lahir' => 'required|date',
    ]);

    //Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);
    
    User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
        'tanggal_lahir' => $request->tanggal_lahir,
    ]);
        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('akun_vip.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $users = User::findOrFail($id);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return view('akun_vip.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);

       // Validasi data yang masuk
    $request->validate([
        'username' => 'required|string|max:255',   
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
        'alamat' => 'required|string|max:255',
        'no_telepon' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
        'tanggal_lahir' => 'required|date',
    ]);

    // Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);

    // Lakukan update berdasarkan input yang diterima
    $users->username = $request->username;
    $users->name = $request->name;
    $users->email = $request->email;
    $users->password = $request->password;
    $users->alamat = $request->alamat;
    $users->no_telepon = $request->no_telepon;
    $users->tanggal_lahir = $request->tanggal_lahir;

    // Jika ada password baru yang diberikan, hash dan simpan
    if ($request->password) {
        $users->password = Hash::make($request->password);
    }

    // Simpan perubahan
    $users->save();

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('akun_vip.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
    
        return redirect()->route('akun_vip.index')->with('success', 'Profil berhasil dihapus!');
    }

    public function cetak(){
        $users = User::all();
        return view ('rekap.cetak-akun_vip', compact('users'));
    }

    public function xlsx()
    {
        return Excel::download(new UserExport, 'akun_vip.xlsx');
    }

    public function getAllAkun_VipNames()
    {
        $akun_vipNames = User::pluck('name')->toArray();
        return response()->json($akun_vipNames);
    }
}
