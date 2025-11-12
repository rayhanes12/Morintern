<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\PesertaCalon;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm() {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request) {
        $request->validate(['email' => 'required|email']);

        // First try peserta_calon broker
        $status = Password::broker('peserta_calon')->sendResetLink($request->only('email'));
        
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        // If peserta not found, try users broker
        $status = Password::broker('users')->sendResetLink($request->only('email'));
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
