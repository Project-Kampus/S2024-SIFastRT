<?php

namespace App\Http\Controllers;

use App\Models\Datawarga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyNikController extends Controller
{
    // Menampilkan form input NIK untuk user
    public function showInputNikForm()
    {
        return view('user.inputNikForm');
    }

    // Menyimpan NIK yang dimasukkan oleh user
    public function storeNik(Request $request)
{
    $request->validate([
        'nik' => 'required|numeric',
    ]);

    // Mendapatkan user yang sedang login
    $user = Auth::user();

    // Pastikan $user adalah instance dari model User
    if (!($user instanceof \App\Models\User)) {
        return redirect()->route('user.inputNikForm')->with('error', 'Terjadi masalah pada data pengguna.');
    }

    // Cek jika NIK sudah diverifikasi sebelumnya
    if ($user->nik_verified_at !== null) {
        return redirect()->route('user.inputNikForm')->with('error', 'NIK sudah diverifikasi.');
    }

    // Menyimpan atau mengupdate NIK
    $user->nik = $request->nik;
    $user->nik_verified_at = null; // Mengatur NIK belum diverifikasi
    $user->save(); // Simpan perubahan

    return redirect()->route('user.inputNikForm')->with('status', 'NIK berhasil disimpan, menunggu verifikasi admin.');
}


    // Menampilkan data user setelah NIK terverifikasi
    public function showUserData()
    {
        $user = Auth::user();

        // Pastikan NIK sudah terverifikasi
        if ($user->nik_verified_at === null) {
            return redirect()->route('user.inputNikForm')->with('error', 'NIK Anda belum diverifikasi.');
        }

        // Ambil data warga berdasarkan NIK
        $dataWarga = Datawarga::where('nik', $user->nik)->first();

        // Jika data warga tidak ditemukan
        if (!$dataWarga) {
            return redirect()->route('user.inputNikForm')->with('error', 'Data warga tidak ditemukan untuk NIK ini.');
        }

        return view('user.dataWarga', compact('dataWarga'));
    }

    // Menampilkan daftar user yang NIK-nya belum diverifikasi (untuk admin)
    public function verifyNikForm()
    {
        // Mengambil data user yang NIK-nya belum diverifikasi
        $users = User::whereNull('nik_verified_at')->where('role', 'user')->get();
        return view('admin.verifyNik', compact('users'));
    }

    // Verifikasi NIK oleh admin
    // Verifikasi NIK oleh admin
public function verifyNik(User $user)
{
    // Hanya admin yang boleh memverifikasi NIK
    if (Auth::user()->role !== 'admin') {
        return redirect()->route('admin.verifyNikForm')->with('error', 'Anda tidak memiliki hak untuk melakukan verifikasi NIK.');
    }

    // Pastikan user sudah menginputkan NIK
    if (empty($user->nik)) {
        return redirect()->route('admin.verifyNikForm')->with('error', 'Pengguna ini belum menginputkan NIK.');
    }

    // Verifikasi NIK oleh admin
    $user->update([
        'nik_verified_at' => now(), // Menambahkan waktu verifikasi
    ]);

    // Update status verifikasi pada data warga
    $dataWarga = Datawarga::where('nik', $user->nik)->first();
    if ($dataWarga) {
        $dataWarga->update([
            'nik_verified' => true, // Ubah status verifikasi
        ]);
    }

    return redirect()->route('admin.verifyNikForm')->with('status', 'NIK berhasil diverifikasi!');
}

}
