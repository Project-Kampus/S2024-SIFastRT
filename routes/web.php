<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatawargaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'create'])->name('laporan.create');
        Route::post('/', [LaporanController::class, 'store'])->name('laporan.store');
        Route::get('/riwayat', [LaporanController::class, 'riwayat'])->name('laporan.riwayat');
    });

    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'userIndex'])->name('jadwal.index'); // Users can view schedules
    });

    Route::prefix('peminjaman')->group(function () {
        Route::get('/peminjaman', [PeminjamanController::class, 'userIndex'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'userCreate'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'userStore'])->name('peminjaman.store');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('admin/datawarga')->group(function () {
        Route::get('/', [DatawargaController::class, 'index'])->name('admin.datawarga.index');
        Route::get('/create', [DatawargaController::class, 'create'])->name('admin.datawarga.create');
        Route::post('/', [DatawargaController::class, 'store'])->name('admin.datawarga.store');
        Route::get('/{id}', [DatawargaController::class, 'show'])->name('admin.datawarga.show');
        Route::get('/{id}/edit', [DatawargaController::class, 'edit'])->name('admin.datawarga.edit');
        Route::put('/{id}', [DatawargaController::class, 'update'])->name('admin.datawarga.update');
        Route::delete('/{id}', [DatawargaController::class, 'destroy'])->name('admin.datawarga.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::post('/laporan/{laporan}', [LaporanController::class, 'update'])->name('admin.laporan.update');
        Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('admin.laporan.show');
        Route::put('/laporan/{laporan}', [LaporanController::class, 'update'])->name('admin.laporan.update');
    });

    // Rute untuk jadwal admin
    Route::prefix('admin/jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal.index');
        Route::get('/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/', [JadwalController::class, 'store'])->name('admin.jadwal.store');
        Route::get('/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        Route::put('/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
        Route::delete('/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');
    });  

    Route::prefix('admin/peminjaman')->group(function () {
        Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create'])->name('admin.peminjaman.create');
    Route::post('/admin/peminjaman', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
    Route::get('/admin/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
    Route::put('/admin/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
    Route::delete('/admin/peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');
    });
});

require __DIR__ . '/auth.php';
