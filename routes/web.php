<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifyNikController;
use App\Http\Controllers\Admin\DatawargaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\KartuKeluargaController;

// Halaman utama diarahkan ke login

Route::get('/', function () {
    return redirect('/homepage');
})->name('homepage');
Route::get('/homepage', function () {
    return view('tugas');
});

Route::get('/login', function () {
    return view('auth.login');
});

// Dashboard yang hanya bisa diakses oleh pengguna yang sudah terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
->name('dashboard');

    
// Routes untuk user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/input-nik', [VerifyNikController::class, 'showInputNikForm'])->name('user.inputNikForm');
    Route::post('/user/store-nik', [VerifyNikController::class, 'storeNik'])->name('user.storeNik');
    Route::get('/user/data-warga', [VerifyNikController::class, 'showUserData'])->name('user.dataWarga');
});

// Route untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::prefix('admin')->name('admin.')->group(function() {
        // CRUD data warga untuk admin
        Route::resource('datawarga', DatawargaController::class);

        Route::resource('kartu_keluarga', KartuKeluargaController::class);

    });

    Route::get('/admin/verify-nik', [VerifyNikController::class, 'verifyNikForm'])->name('admin.verifyNikForm');
        Route::post('/admin/verify-nik/{user}', [VerifyNikController::class, 'verifyNik'])->name('admin.verifyNik');
});

// Verifikasi email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Require file auth
require __DIR__ . '/auth.php';
