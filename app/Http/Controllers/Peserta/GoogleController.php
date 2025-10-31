<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cari peserta berdasarkan google_id atau email
        $peserta = Peserta::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if ($peserta) {
            if (!$peserta->google_id) {
                $peserta->update(['google_id' => $googleUser->getId()]);
            }
        } else {
            $peserta = Peserta::create([
                'nama_lengkap' => $googleUser->getName() ?? 'Google Peserta',
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => null,
            ]);
        }

        // Login langsung sebagai peserta
        Auth::guard('peserta')->login($peserta, true);

        return redirect()->intended('/dashboard');
    }
}