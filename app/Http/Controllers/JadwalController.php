<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Menampilkan daftar jadwal
    public function index()
    {
        $jadwals = Jadwal::all(); // Mengambil semua data jadwal
        return view('admin.jadwal.index', compact('jadwals'));
    }

    // Menampilkan form untuk menambahkan jadwal
    public function create()
    {
        return view('admin.jadwal.create');
    }

    // Menyimpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date', // Validasi format tanggal
        ]);

        Jadwal::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal, // Simpan tanggal
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jadwal
    public function edit(Jadwal $jadwal) // Model binding untuk mendapatkan jadwal
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    // Memperbarui jadwal
    public function update(Request $request, Jadwal $jadwal) // Model binding untuk mendapatkan jadwal
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date', // Validasi format tanggal
        ]);

        $jadwal->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal, // Update tanggal
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Menghapus jadwal
    public function destroy(Jadwal $jadwal) // Model binding untuk mendapatkan jadwal
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    // Untuk user melihat jadwal
    public function userIndex()
    {
        $jadwals = Jadwal::all(); // Mengambil semua data jadwal
        return view('jadwal.index', compact('jadwals'));
    }
}
