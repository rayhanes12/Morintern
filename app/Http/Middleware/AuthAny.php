<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAny
{
    /**
     * Handle an incoming request.
     * Allow access if either the default 'web' guard or 'peserta' guard is authenticated.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() || Auth::guard('peserta')->check()) {
            return $next($request);
        }

        // Not authenticated by either guard.
        return redirect()->guest(route('login'));
    }
}
