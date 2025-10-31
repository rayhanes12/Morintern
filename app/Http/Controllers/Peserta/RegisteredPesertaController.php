<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pesertas'],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $peserta = Peserta::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

        return redirect()->intended('/dashboard');
    }
}