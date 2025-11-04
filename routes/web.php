<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\Peserta\SocialController as PesertaSocialController;


// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');


//  DASHBOARD (HRD & PESERTA)
Route::get('/dashboard', function () {
    if (Auth::guard('web')->check() || Auth::guard('peserta')->check()) {
        return view('dashboard');
    }
    return redirect()->route('login');
})->name('dashboard');


//  ROUTE YANG BUTUH LOGIN (HRD ATAU PESERTA)
Route::middleware(\App\Http\Middleware\AuthAny::class)->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['post', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Anggota management (AJAX)
    Route::prefix('profile/anggota')->name('profile.anggota.')->group(function () {
        Route::get('/', [ProfileController::class, 'getAnggota'])->name('index');
        Route::post('/', [ProfileController::class, 'storeAnggota'])->name('store');
        Route::delete('/{id}', [ProfileController::class, 'destroyAnggota'])->name('destroy');
    });

    // Password update
    Route::put('password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])
        ->name('password.update');
});


//  LOGIN DENGAN GOOGLE (HRD / USER UTAMA)
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//  LOGIN DENGAN GOOGLE (PESERTA)
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/auth/google', [PesertaSocialController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [PesertaSocialController::class, 'handleGoogleCallback']);
});

//  ROUTE TAMBAHAN
require __DIR__ . '/auth.php';
require __DIR__ . '/peserta.php';
