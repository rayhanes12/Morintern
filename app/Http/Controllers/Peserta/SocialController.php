<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\PesertaCalon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        // Override konfigurasi Google untuk peserta
        config([
            'services.google.client_id' => env('GOOGLE_CLIENT_ID_PESERTA'),
            'services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_PESERTA'),
            'services.google.redirect' => env('GOOGLE_REDIRECT_PESERTA'),
        ]);

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        config([
            'services.google.client_id' => env('GOOGLE_CLIENT_ID_PESERTA'),
            'services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_PESERTA'),
            'services.google.redirect' => env('GOOGLE_REDIRECT_PESERTA'),
        ]);

        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cek apakah peserta sudah ada
        $peserta = PesertaCalon::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if ($peserta) {
            if (!$peserta->google_id) {
                $peserta->update(['google_id' => $googleUser->getId()]);
            }
        } else {
            $peserta = PesertaCalon::create([
                'nama_lengkap' => $googleUser->getName() ?? 'Peserta Google',
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => null,
            ]);
        }

        // Login via guard peserta
        Auth::guard('peserta')->login($peserta, true);

        return redirect()->route('peserta.dashboard');
    }
}
