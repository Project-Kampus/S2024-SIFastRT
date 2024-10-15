<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatawargaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JadwalController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard yang hanya bisa diakses oleh pengguna yang sudah terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Middleware untuk otentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Laporan user
    Route::prefix('laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'create'])->name('laporan.create');
        Route::post('/', [LaporanController::class, 'store'])->name('laporan.store');
        Route::get('/riwayat', [LaporanController::class, 'riwayat'])->name('laporan.riwayat');
    });

    // Penjadwalan user
    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'userIndex'])->name('jadwal.index'); // Users can view schedules
    });

    // Peminjaman user
    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'userIndex'])->name('peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'userCreate'])->name('peminjaman.create');
        Route::post('/', [PeminjamanController::class, 'userStore'])->name('peminjaman.store');
    });
});

// Route untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Route datawarga admin
    Route::prefix('admin/datawarga')->group(function () {
        Route::get('/', [DatawargaController::class, 'index'])->name('admin.datawarga.index');
        Route::get('/create', [DatawargaController::class, 'create'])->name('admin.datawarga.create');
        Route::post('/', [DatawargaController::class, 'store'])->name('admin.datawarga.store');
        Route::get('/{id}', [DatawargaController::class, 'show'])->name('admin.datawarga.show');
        Route::get('/{id}/edit', [DatawargaController::class, 'edit'])->name('admin.datawarga.edit');
        Route::put('/{id}', [DatawargaController::class, 'update'])->name('admin.datawarga.update');
        Route::delete('/{id}', [DatawargaController::class, 'destroy'])->name('admin.datawarga.destroy');
    });

    // Route laporan admin
    Route::prefix('admin/laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::post('/{laporan}', [LaporanController::class, 'update'])->name('admin.laporan.update');
        Route::get('/{id}', [LaporanController::class, 'show'])->name('admin.laporan.show');
        Route::put('/{laporan}', [LaporanController::class, 'update'])->name('admin.laporan.update');
    });

    // Route penjadwalan admin
    Route::prefix('admin/jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal.index');
        Route::get('/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/', [JadwalController::class, 'store'])->name('admin.jadwal.store');
        Route::get('/{jadwal}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit'); // Menggunakan model binding
        Route::put('/{jadwal}', [JadwalController::class, 'update'])->name('admin.jadwal.update'); // Menggunakan model binding
        Route::delete('/{jadwal}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy'); // Menggunakan model binding
    });

    // Route peminjaman admin
    Route::prefix('admin/peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('admin.peminjaman.create');
        Route::post('/', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
        Route::put('/{id}', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
        Route::delete('/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');
    });
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
