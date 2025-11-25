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

    // Secure file downloads (signed URLs)
    Route::middleware('signed')->group(function () {
        Route::get('/files/peserta/{peserta}/cv', [ProfileController::class, 'downloadCv'])->name('files.peserta.cv.download');
        Route::get('/files/peserta/{peserta}/surat', [ProfileController::class, 'downloadSurat'])->name('files.peserta.surat.download');
        Route::get('/files/calon/{calon}/cv', [ProfileController::class, 'downloadCvCalon'])->name('files.calon.cv.download');
        Route::get('/files/calon/{calon}/surat', [ProfileController::class, 'downloadSuratCalon'])->name('files.calon.surat.download');
    });

    // Anggota management (AJAX)
    Route::prefix('profile/anggota')->name('profile.anggota.')->group(function () {
        Route::get('/', [ProfileController::class, 'getAnggota'])->name('index');
        Route::post('/', [ProfileController::class, 'storeAnggota'])->name('store');
        Route::delete('/{id}', [ProfileController::class, 'destroyAnggota'])->name('destroy');
    });

    // Penilaian endpoint for authenticated user (web or peserta)
    Route::get('/profile/penilaian', [ProfileController::class, 'getPenilaian'])
        ->name('profile.penilaian');

    // Password update
    Route::put('password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])
        ->name('password.update');
});

// HRD Dashboard Routes
Route::prefix('hrd')->middleware('auth:web')->name('hrd.')->group(function () {
    Route::get('/calon', [App\Http\Controllers\Hrd\PesertaController::class, 'index'])->name('peserta.index');
    Route::post('/calon/{calon}/approve', [App\Http\Controllers\Hrd\PesertaController::class, 'approve'])->name('peserta.approve');
    Route::post('/calon/{calon}/reject', [App\Http\Controllers\Hrd\PesertaController::class, 'reject'])->name('peserta.reject');
});



//  LOGIN DENGAN GOOGLE (HRD / USER UTAMA)
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//  LOGIN DENGAN GOOGLE (PESERTA)
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/auth/google', [PesertaSocialController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [PesertaSocialController::class, 'handleGoogleCallback']);
});

// Landing pages
// Route::get('/', function () {
//     return view('landing.home'); // halaman Home
// })->name('landing.home');

// Route::get('/tentang', function () {
//     return view('landing.tentang'); // halaman Tentang
// })->name('landing.tentang');

// Route::get('/kontak', function () {
//     return view('landing.kontak'); // halaman Kontak
// })->name('landing.kontak');

//  ROUTE TAMBAHAN
require __DIR__ . '/auth.php';
require __DIR__ . '/peserta.php';
