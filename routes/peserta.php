<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Peserta\RegisteredPesertaController;
use App\Http\Controllers\Peserta\AuthenticatedPesertaController;
use App\Http\Controllers\Peserta\PasswordResetLinkController;
use App\Http\Controllers\Peserta\NewPasswordController;
use App\Http\Controllers\Peserta\GoogleController;
use App\Http\Controllers\Peserta\PesertaProfileController;

// Register
Route::get('/peserta/register', [RegisteredPesertaController::class, 'create'])
    ->middleware('guest:peserta')
    ->name('peserta.register');
Route::post('/peserta/register', [RegisteredPesertaController::class, 'store'])
    ->middleware('guest:peserta');  

// Login
Route::get('/peserta/login', [AuthenticatedPesertaController::class, 'create'])
    ->middleware('guest:peserta')
    ->name('peserta.login');
Route::post('/peserta/login', [AuthenticatedPesertaController::class, 'store'])
    ->middleware('guest:peserta');

// Logout
Route::post('/peserta/logout', [AuthenticatedPesertaController::class, 'destroy'])
    ->middleware('auth:peserta')
    ->name('peserta.logout');

// Forgot Password
Route::get('/peserta/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest:peserta')
    ->name('peserta.password.request');
Route::post('/peserta/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest:peserta')
    ->name('peserta.password.email');

// Reset Password
Route::get('/peserta/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest:peserta')
    ->name('peserta.password.reset');
Route::post('/peserta/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest:peserta')
    ->name('peserta.password.store');

// Google OAuth
Route::get('/peserta/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('peserta.google.login');
Route::get('/peserta/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']); 


Route::middleware(['auth:peserta'])->group(function () {
    Route::get('/peserta/profile', [PesertaProfileController::class, 'edit'])->name('peserta.profile');
    Route::patch('/peserta/profile', [PesertaProfileController::class, 'update'])->name('peserta.profile.update');
    Route::delete('/peserta/profile', [PesertaProfileController::class, 'destroy'])->name('peserta.profile.destroy');
});


// Di routes/peserta.php
// Route::middleware('auth:peserta')->group(function () {
//     Route::get('/peserta/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('/peserta/profile', [\App\Http\Controllers\Peserta\PesertaProfileController::class, 'edit'])
//         ->name('peserta.profile.edit');

//     Route::patch('/peserta/profile', [\App\Http\Controllers\Peserta\PesertaProfileController::class, 'update'])
//         ->name('peserta.profile.update');

//     Route::delete('/peserta/profile', [\App\Http\Controllers\Peserta\PesertaProfileController::class, 'destroy'])
//         ->name('peserta.profile.destroy');
// });
