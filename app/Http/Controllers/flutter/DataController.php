<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function feedback(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|max:255',
        ]);

       // Create a new feedback
       $feedback = new Feedback();
       $feedback->keterangan = $validatedData['keterangan'];
       $feedback->save();

        // Beri respons ke aplikasi Flutter
        return response()->json(['message' => 'Feedback terkirim'], 200);
    }
}
