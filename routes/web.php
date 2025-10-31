<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\Peserta\SocialController as PesertaSocialController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk HRD & Intern
Route::get('/dashboard', function () {
    if (Auth::guard('web')->check() || Auth::guard('peserta')->check()) {
        return view('dashboard');
    }
    return redirect()->route('login');
})->name('dashboard');


// Route yang butuh login (HRD atau Intern)
// Use the AuthAny middleware class which allows either the 'web' or 'intern' guard.
Route::middleware(\App\Http\Middleware\AuthAny::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Password update route
    Route::put('password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])
        ->name('password.update');
});

// Google Login untuk HRD/User utama
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/auth/google', [PesertaSocialController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [PesertaSocialController::class, 'handleGoogleCallback']);
});


// Include route tambahan
require __DIR__.'/auth.php';
require __DIR__.'/peserta.php';
