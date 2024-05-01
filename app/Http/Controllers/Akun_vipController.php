<?php

namespace App\Http\Controllers;
use App\Models\akun_vipModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Akun_vipController extends Controller
{
    public function index(){
        $akun_vips = akun_vipModels::orderBy('created_at', 'desc')->paginate(6);
        
        return view ('view.akun_vip', compact('akun_vips'));
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
         // Validasi data yang masuk
        $request->validate([
        'username' => 'required|string|max:255',   
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:akun_vips',
        'password' => 'required|string|min:8',
        'alamat' => 'required|string|max:255',
        'no_telepon' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
        'tanggal_lahir' => 'required|date',
    ]);

    //Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);
    
    akun_vipModels::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
        'tanggal_lahir' => $request->tanggal_lahir,
    ]);

    // Buat objek DataRequest baru
    // $newRequest = new akun_vipModels();
    // $newRequest->username = $validatedData['username'];
    // $newRequest->name = $validatedData['name'];
    // $newRequest->email = $validatedData['email'];
    // $newRequest->password = $validatedData['password'];
    // $newRequest->alamat = $validatedData['alamat'];
    // $newRequest->no_telepon = $validatedData['no_telepon'];
    // $newRequest->tanggal_lahir = $validatedData['tanggal_lahir'];

    //  // Simpan request baru
    //  $newRequest->save();

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('akun_vip.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $akun_vips = akun_vipModels::findOrFail($id);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return view('akun_vip.edit', compact('akun$akun_vips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $akun_vips = akun_vipModels::findOrFail($id);

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

    // Hash password sebelum menyimpannya
    $hashedPassword = Hash::make($request->password);

    // Lakukan update berdasarkan input yang diterima
    $akun_vip->username = $request->username;
    $akun_vip->name = $request->name;
    $akun_vip->email = $request->email;
    $akun_vip->password = $request->password;
    $akun_vip->alamat = $request->alamat;
    $akun_vip->no_telepon = $request->no_telepon;
    $akun_vip->tanggal_lahir = $request->tanggal_lahir;

    // Jika ada password baru yang diberikan, hash dan simpan
    if ($request->password) {
        $akun_vip->password = Hash::make($request->password);
    }

    // Simpan perubahan
    $akun_vip->save();

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return redirect()->route('akun_vip.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy(string $id)
    {
        $akun_vips = akun_vipModels::findOrFail($id);
        $akun_vips->delete();
    
        return redirect()->route('akun_vip.index')->with('success', 'Profil berhasil dihapus!');
    }

    public function cetak(){
        $akun_vips = akun_vipModels::all();
        return view ('rekap.cetak-akun', compact('akun$akun_vips'));
    }

    public function xlsx()
    {
        return Excel::download(new AkunVIPExport, 'akun_vip.xlsx');
    }

    public function getAllUserNames()
    {
        $akun_vipNames = akun_vipModels::pluck('name')->toArray();
        return response()->json($akun_vipNames);
    }
}
