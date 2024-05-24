<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vip; 
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class VipsController extends Controller
{
    public function show()
    {
        try {
            $vip = Vip::all();

            return response()->json($vip, 200);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Failed to fetch vip.', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'Failed to fetch vip'], 500);
        }
    }
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'kd_undangan' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keperluan' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'departemen' => 'required|string',
            'seksi' => 'required|string',
            'status' => 'required|string|in:pending',
            'ket' => 'required|string',
            'jam' => 'required|string|max:8'
        ]);

        try {
            // Simpan data VIP ke dalam database
            $vip = new Vip();
            $vip->kd_undangan = ""; // Menggunakan operator null coalescing
            $vip->nama = $validatedData['nama'];
            $vip->alamat = $validatedData['alamat'];
            $vip->keperluan = $validatedData['keperluan'];
            $vip->asal_instansi = $validatedData['asal_instansi'];
            $vip->no_hp = $validatedData['no_hp'];
            $vip->tanggal = $validatedData['tanggal'];
            $vip->jam = $validatedData['jam'];
            $vip->departemen = $validatedData['departemen'];
            $vip->seksi = $validatedData['seksi'];
            $vip->status = $validatedData['status'];
            $vip->ket = $validatedData['ket'];
            $vip->save();

            // Jika data berhasil disimpan, kirim respon JSON dengan kode status 201 (Created)
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!', 'data' => $vip], 201);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat menyimpan data, kirim respon JSON dengan pesan kesalahan yang umum
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan data'], 500);
        }
    }
}
