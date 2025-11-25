<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use App\Models\PesertaCalon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredPesertaController extends Controller
{
    public function create()
    {
        return view('peserta.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:peserta_calon'],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $peserta = PesertaCalon::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            // Let the model hash the password to avoid double-hashing
            'password' => $request->password,
            'no_telp' => $request->no_telp,
            'github' => '-', // default kosong
            'linkedin' => '-', // default kosong
            'tanggal_mulai' => now(), // isi tanggal hari ini
            'tanggal_selesai' => now(), // sementara isi sama
            'kelompok_id' => 0, // isi angka default
            'cv' => '-', // placeholder file
            'surat' => '-', // placeholder file
        ]);


        event(new Registered($peserta));

        Auth::guard('peserta')->login($peserta);

        // Redirect to landing page after registration
        return redirect()->route('landing');
    }
}