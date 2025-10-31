<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $guard = Auth::check() ? 'web' : (Auth::guard('peserta')->check() ? 'peserta' : null);
        
        $currentPasswordRule = $guard ? 'current_password:'.$guard : 'current_password';

        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', $currentPasswordRule],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();
        
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
