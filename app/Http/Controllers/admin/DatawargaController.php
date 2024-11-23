<?php

namespace App\Http\Controllers\Admin;

use App\Models\Datawarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DatawargaController extends Controller
{
    public function index()
    {
        // Mengambil semua data warga dengan pagination
        $datawargas = Datawarga::paginate(10);  // Menampilkan 10 data per halaman
        return view('admin.datawarga.index', compact('datawargas'));
    }

    public function create()
    {
        return view('admin.datawarga.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:datawargas',
            'tempat_lahir' => 'required|string|max:255',  // Tempat Lahir
            'tanggal_lahir' => 'required|date',  // Tanggal Lahir
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah,Cerai',
            'pekerjaan' => 'required|string'
        ]);

        // Menyimpan data warga baru
        Datawarga::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit(Datawarga $datawarga)
    {
        return view('admin.datawarga.edit', compact('datawarga'));
    }

    public function update(Request $request, Datawarga $datawarga)
    {
        // Validasi input untuk update
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:datawargas,nik,' . $datawarga->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Menikah,Menikah,Cerai',
            'pekerjaan' => 'required|string'
        ]);

        // Update data warga
        $datawarga->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Datawarga $datawarga)
    {
        $datawarga->delete();
        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil dihapus.');
    }

    public function show($id)
    {
        // Menampilkan detail data warga
        $datawarga = Datawarga::findOrFail($id);
        return view('admin.datawarga.show', compact('datawarga'));
    }

    // Fungsi untuk memverifikasi NIK
    public function verifyNik($id)
    {
        $datawarga = Datawarga::findOrFail($id);
        $datawarga->nik_verified = true;  // Set NIK sebagai terverifikasi
        $datawarga->nik_verified_at = now(); // Menambahkan waktu verifikasi
        $datawarga->save();

        return redirect()->route('admin.datawarga.index')->with('success', 'NIK warga telah diverifikasi.');
    }

    // Menambahkan fungsi untuk menampilkan status verifikasi di index
    public function verifiedStatus($id)
    {
        $datawarga = Datawarga::findOrFail($id);
        return view('admin.datawarga.show', compact('datawarga'));
    }
}
