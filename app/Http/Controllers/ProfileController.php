<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
    // Determine which guard the user is authenticated with so we can
    // validate the current password against the correct guard.
    $guard = Auth::check() ? 'web' : (Auth::guard('peserta')->check() ? 'peserta' : null);

        $passwordRule = ['required'];
        if ($guard) {
            $passwordRule[] = 'current_password:'.$guard;
        } else {
            $passwordRule[] = 'current_password';
        }

        $request->validateWithBag('userDeletion', [
            'password' => $passwordRule,
        ]);

        $user = Auth::check() ? Auth::user() : Auth::guard('peserta')->user();

        // Logout from the specific guard used.
        if ($guard === 'peserta') {
            Auth::guard('peserta')->logout();
        } else {
            Auth::logout();
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
