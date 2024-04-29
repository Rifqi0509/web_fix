<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return response()->json([
                'success' => true,
            ]);
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
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
}
