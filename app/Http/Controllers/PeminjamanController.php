<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Untuk admin
    public function index()
    {
        // Menampilkan semua peminjaman untuk admin
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        return view('admin.peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'fasilitas' => 'required|in:tenda,sound system,kursi',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ]);

        Peminjaman::create([
            'nama' => $request->nama,
            'fasilitas' => $request->fasilitas,
            'tanggal_peminjaman' => Carbon::parse($request->tanggal_peminjaman),
            'tanggal_pengembalian' => Carbon::parse($request->tanggal_pengembalian),
            'status' => 'sedang menunggu',
        ]);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diajukan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|string|max:255',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->nama = $request->input('nama');
        $peminjaman->fasilitas = $request->input('fasilitas');
        $peminjaman->tanggal_peminjaman = $request->input('tanggal_peminjaman');
        $peminjaman->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $peminjaman->status = $request->input('status');
        $peminjaman->save();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    // Untuk user
    public function userIndex()
    {
        $user = Auth::user(); // Menggunakan facade Auth

        // Periksa apakah user ada
        if (!$user) {
            return redirect()->route('login'); // Redirect ke halaman login jika tidak ada
        }

        // Tampilkan peminjaman hanya untuk user yang sedang login
        $peminjaman = Peminjaman::where('nama', $user->name)->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function userCreate()
    {
        return view('peminjaman.create'); // Ganti dengan view yang sesuai untuk user
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'fasilitas' => 'required|in:tenda,sound system,kursi',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ]);

        Peminjaman::create([
            'nama' => Auth::user()->name, // Mengambil nama dari pengguna yang sedang login
            'fasilitas' => $request->fasilitas,
            'tanggal_peminjaman' => Carbon::parse($request->tanggal_peminjaman),
            'tanggal_pengembalian' => Carbon::parse($request->tanggal_pengembalian),
            'status' => 'sedang menunggu',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diajukan.');
    }
}
