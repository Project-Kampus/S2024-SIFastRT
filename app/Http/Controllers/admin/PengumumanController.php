<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index() {
        // Menampilkan pengumuman yang aktif
        $pengumuman = Pengumuman::where('is_active', true)->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function indexUser()
{
    // Fetch active announcements for users
    $pengumumans = Pengumuman::where('is_active', true)->latest()->paginate(10);

    return view('pengumuman.index', compact('pengumumans'));
}
public function indexDashboard()
{
    // Mengambil 3 pengumuman terbaru yang aktif
    $pengumumans = Pengumuman::where('is_active', true)->latest()->take(3)->get();

    return view('dashboard', compact('pengumumans'));
}


    public function create() {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'nullable|date',
            'tanggal_berlaku' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable|string',
        ]);
    
        // Menyimpan gambar jika ada
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/pengumuman');
        }

        // Membuat pengumuman baru
        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'tanggal_berlaku' => $request->tanggal_berlaku,
            'lokasi' => $request->lokasi,
            'gambar' => $path, 
            'kontak' => $request->kontak,
            'is_active' => true,
        ]);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit($id) {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'nullable|date',
            'tanggal_berlaku' => 'nullable|date',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kontak' => 'nullable|string',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        // Update data kecuali gambar
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->tanggal_berlaku = $request->tanggal_berlaku;
        $pengumuman->lokasi = $request->lokasi;
        $pengumuman->kontak = $request->kontak;

        // Cek apakah ada gambar yang di-upload
        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar && Storage::exists('public/' . $pengumuman->gambar)) {
                Storage::delete('public/' . $pengumuman->gambar);
            }
            $path = $request->file('gambar')->store('pengumuman', 'public');
            $pengumuman->gambar = $path;
        }

        $pengumuman->save();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id) {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->gambar) {
            Storage::delete($pengumuman->gambar);
        }

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
