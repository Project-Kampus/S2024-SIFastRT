<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // Halaman untuk user
    public function create()
    {
        return view('laporan.create');
    }

    // riwayat
    public function riwayat()
    {
        // Cek apakah pengguna sudah terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login'); // Atau route lain sesuai kebutuhan
        }

        // Ambil laporan berdasarkan nama pelapor
        $laporans = Laporan::where('nama_pelapor', Auth::user()->name)->get();

        return view('laporan.riwayat', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.show', compact('laporan'));
    }

    // Simpan laporan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'deskripsi' => 'required|string',
        ]);

        // Simpan laporan ke dalam database
        $laporan = new Laporan();
        $laporan->nama_pelapor = Auth::user()->name; // Menggunakan nama pengguna yang sedang login
        $laporan->nomor_telepon = $request->nomor_telepon;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->status = 'baru'; // Atur status awal
        $laporan->save();

        // Redirect dengan flash message
        return redirect()->route('laporan.create')->with('success', 'Laporan berhasil dibuat.');
    }

    // Halaman untuk admin
    public function index()
    {
        $laporans = Laporan::all();

        // Hitung jumlah laporan berdasarkan status
        $totalPelapor = $laporans->count();
        $laporanBaru = $laporans->where('status', 'baru')->count();
        $laporanDiproses = $laporans->where('status', 'diproses')->count();
        $laporanSelesai = $laporans->where('status', 'selesai')->count();

        return view('admin.laporan.index', compact('laporans', 'totalPelapor', 'laporanBaru', 'laporanDiproses', 'laporanSelesai'));
    }

    // Ubah status laporan
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|string|in:baru,diproses,selesai',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Update status dan catatan laporan
        $laporan->status = $request->input('status');
        $laporan->catatan = $request->input('catatan'); // Simpan catatan
        $laporan->save();

        return redirect()->route('admin.laporan.index')->with('success', 'Status laporan berhasil diperbarui.');
    }
}
