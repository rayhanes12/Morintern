<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\Peserta\SocialController as PesertaSocialController;


// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');


//  DASHBOARD (HRD & PESERTA) - dengan auto-routing ke view yang sesuai
Route::get('/dashboard', function () {
    if (Auth::guard('web')->check()) {
        return view('dashboard'); // Admin/HRD dashboard
    } elseif (Auth::guard('peserta')->check()) {
        return view('dashboard'); // Peserta dashboard
    }
    return redirect()->route('login');
})->middleware(\App\Http\Middleware\AuthAny::class)->name('dashboard');


//  ROUTE UNTUK PROFILE (BERLAKU UNTUK PESERTA & USER/HRD)
Route::middleware(\App\Http\Middleware\AuthAny::class)->group(function () {
    Route::get('/profile', function (\Illuminate\Http\Request $request) {
        if (\Illuminate\Support\Facades\Auth::guard('peserta')->check()) {
            return app(\App\Http\Controllers\Peserta\PesertaProfileController::class)->edit($request);
        } else {
            return app(\App\Http\Controllers\UserProfileController::class)->edit($request);
        }
    })->name('profile.edit');

    Route::match(['post', 'patch'], '/profile', function (\Illuminate\Http\Request $request) {
        if (\Illuminate\Support\Facades\Auth::guard('peserta')->check()) {
            return app(\App\Http\Controllers\Peserta\PesertaProfileController::class)->update($request);
        } else {
            return app(\App\Http\Controllers\UserProfileController::class)->update($request);
        }
    })->name('profile.update');

    Route::delete('/profile', function (\Illuminate\Http\Request $request) {
        if (\Illuminate\Support\Facades\Auth::guard('peserta')->check()) {
            return app(\App\Http\Controllers\Peserta\PesertaProfileController::class)->destroy($request);
        } else {
            return app(\App\Http\Controllers\UserProfileController::class)->destroy($request);
        }
    })->name('profile.destroy');

    // Anggota management (AJAX) - Peserta only
    Route::prefix('profile/anggota')->name('profile.anggota.')->group(function () {
        Route::delete('/{id}', function ($id) {
            return app(\App\Http\Controllers\Peserta\PesertaProfileController::class)->destroyAnggota($id);
        })->name('destroy');
        
        Route::get('/', function () {
            return app(\App\Http\Controllers\Peserta\PesertaProfileController::class)->getAnggota(request());
        })->name('index');
    });

    // Password update
    Route::put('password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])
        ->name('password.update');
});

// HRD Dashboard Routes
Route::prefix('hrd')->middleware('auth:web')->name('hrd.')->group(function () {
    Route::get('/calon', [App\Http\Controllers\Hrd\PesertaController::class, 'index'])->name('peserta.index');
    Route::post('/calon/{id}/approve', [App\Http\Controllers\Hrd\PesertaController::class, 'approve'])->name('peserta.approve');
    Route::post('/calon/{id}/reject', [App\Http\Controllers\Hrd\PesertaController::class, 'reject'])->name('peserta.reject');
});



//  LOGIN DENGAN GOOGLE (HRD / USER UTAMA)
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//  LOGIN DENGAN GOOGLE (PESERTA)
Route::prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/auth/google', [PesertaSocialController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [PesertaSocialController::class, 'handleGoogleCallback']);
});


Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // view untuk HRD/Admin
    })->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\UserProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\UserProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\UserProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


//  ROUTE TAMBAHAN
require __DIR__ . '/auth.php';
require __DIR__ . '/peserta.php';
