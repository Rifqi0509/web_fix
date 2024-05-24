<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Vip;
use App\Exports\VipExport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class VipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vips = Vip::orderBy('created_at', 'desc')->paginate(10);
        return view('view.vip', compact('vips'));
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
        try {
            // Validasi data yang masuk
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'keperluan' => 'required|string|max:255',
                'asal_instansi' => 'required|string|max:255',
                'no_hp' => 'required|string|regex:/^08[0-9]{10,}$/|max:255', // Dimulai dengan "08" dan minimal 12 karakter
                'tanggal' => 'required|date',
                'jam' => 'required|date_format:H:i', // Validasi jam
                'departemen' => 'required|string',
                'seksi' => 'required|string',
                'ket' => 'required|string',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Simpan data ke database dengan status default "pending"
            $vip = Vip::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'keperluan' => $request->keperluan,
                'asal_instansi' => $request->asal_instansi,
                'no_hp' => $request->no_hp,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'departemen' => $request->departemen,
                'seksi' => $request->seksi,
                'status' => 'pending', // Atur status menjadi "pending"
                'ket' => $request->ket,
            ]);

            // Jika data berhasil disimpan, kirim respon JSON
            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!', 'data' => $vip], 201);
        } catch (ValidationException $e) {
            // Jika terjadi kesalahan validasi, kirim respon JSON dengan pesan kesalahan
            return response()->json(['success' => false, 'message' => 'Validasi gagal', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan lainnya, kirim respon JSON dengan pesan kesalahan server
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan server'], 500);
        }
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
        $vips = Vip::findOrFail($id);

        // Redirect atau kembali ke halaman sebelumnya dengan notifikasi
        return view('vip.edit', compact('vips'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Temukan data Vip berdasarkan ID
            $vip = Vip::findOrFail($id);

            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'keperluan' => 'required|string|max:255',
                'asal_instansi' => 'required|string|max:255',
                'no_hp' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'departemen' => 'required|string',
                'seksi' => 'required|string',
                'status' => 'required|string', // Sesuaikan aturan validasi ini dengan kebutuhan Anda
                'ket' => 'required|string',
            ]);

            // Jika status disetujui dan kd_undangan masih null atau kosong, buat kode unik baru
            if ($request->status === 'Approved') {
                do {
                    $kode_unik = Str::random(8); // Menghasilkan kode unik baru
                } while (Vip::where('kd_undangan', $kode_unik)->exists()); // Periksa apakah kode unik sudah ada dalam database

                // Setelah keluar dari perulangan, berarti kode unik unik dan bisa disimpan
                $vip->kd_undangan = $kode_unik; // Perbarui kd_undangan dengan kode unik baru
            }


            // Perbarui data Vip dengan data yang telah divalidasi
            $vip->update($validatedData);

            // Kembalikan respons redirect dengan pesan sukses
            return redirect()->route('vip.index')->with('success', 'Data berhasil diperbarui!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Data tidak ditemukan.']);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Tangani kesalahan umum
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vips = Vip::findOrFail($id);
        $vips->delete();

        return redirect()->route('vip.index')->with('success', 'Data berhasil dihapus!');
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
        $cetakPertanggal = Vip::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();
        return view('vip.cetak-vip-tanggal', compact('cetakPertanggal'));
    }

    public function getAllVipNames()
    {
        $vipNames = Vip::pluck('nama')->toArray();
        return response()->json($vipNames);
    }
}
