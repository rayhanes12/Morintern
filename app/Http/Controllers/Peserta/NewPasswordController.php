<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\PesertaCalon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    public function create(Request $request): View
    {
        // Make sure user is logged out before showing reset form
        if (auth('peserta')->check()) {
            auth('peserta')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return view('peserta.auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request): RedirectResponse
    {
        \Log::info('Password reset attempt for: ' . $request->email);
        
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::broker('peserta_calon')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (PesertaCalon $peserta) use ($request) {
                $peserta->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($peserta));
            }
        );

        \Log::info('Password reset status: ' . $status);

        if ($status === Password::PASSWORD_RESET) {
            if (auth('peserta')->check()) {
                auth('peserta')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
            return redirect('peserta/login')->with('status', __($status));
        }
        
        return back()->withErrors(['email' => [__($status)]]);
    }
}