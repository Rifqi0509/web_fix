<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Mendapatkan pengguna yang diautentikasi

            return response()->json([
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'alamat' => $user->alamat,
                    'no_telepon' => $user->no_telepon,
                    'tanggal_lahir' => $user->tanggal_lahir,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401); // Unauthorized status code
        }
    }


    public function register(Request $request)
    {
        // Validasi data registrasi
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            // Add validation rules for additional fields as needed
        ]);

        // Create a new user
        $user = new User();
        $user->username = $validatedData['username'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->alamat = $validatedData['alamat'];
        $user->no_telepon = $validatedData['no_telepon'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->save();

        // Beri respons ke aplikasi Flutter
        return response()->json(['message' => 'User registered successfully'], 200);
    }
    public function updateProfile(Request $request)
    {
        // Tambahkan validasi untuk tanggal lahir
        $request->validate([
            'id' => 'required|exists:users,id',
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required|date',  // Validasi untuk tanggal lahir
        ]);

        $user = User::find($request->id);

        // Perbarui data pengguna dengan data yang diterima dari request
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;
        $user->tanggal_lahir = $request->tanggal_lahir;  // Tambahkan tanggal lahir

        // Simpan perubahan
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }

    public function show()
    {
        try {
            $user = User::all();

            return response()->json($user, 200);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Failed to fetch user.', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'Failed to fetch user'], 500);
        }
    }
}
