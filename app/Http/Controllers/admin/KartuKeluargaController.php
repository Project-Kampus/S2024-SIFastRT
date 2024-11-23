<?php

namespace App\Http\Controllers\Admin;

use App\Models\KartuKeluarga;
use App\Models\Datawarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $kartuKeluarga = KartuKeluarga::with('kepalaKeluarga')->get();
        return view('admin.kartu_keluarga.index', compact('kartuKeluarga'));
    }

    public function create()
    {
        $datawargas = Datawarga::all();
        return view('admin.kartu_keluarga.create', compact('datawargas'));
    }

    public function show($id)
    {
        $kartuKeluarga = KartuKeluarga::with('kepalaKeluarga', 'anggotaKeluarga')->findOrFail($id);

        // Menangani kemungkinan anggota keluarga tidak ada
        $anggotaKeluarga = $kartuKeluarga->anggotaKeluarga ?? collect();

        return view('admin.kartu_keluarga.show', compact('kartuKeluarga', 'anggotaKeluarga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kk' => 'required|unique:kartu_keluarga',
            'alamat' => 'required',
            'rt_rw' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'provinsi' => 'required',
            'kepala_keluarga' => 'required|exists:datawargas,id',
            'anggota' => 'array',
            'anggota.*' => 'exists:datawargas,id',
        ]);

        // Menyimpan Kartu Keluarga
        $kartuKeluarga = KartuKeluarga::create($request->only(['nomor_kk', 'alamat', 'rt_rw', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'kode_pos', 'provinsi', 'kepala_keluarga']));

        // Menyinkronkan anggota keluarga jika ada
        if ($request->has('anggota')) {
            $kartuKeluarga->anggotaKeluarga()->sync($request->anggota);
        }

        return redirect()->route('admin.kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $datawargas = Datawarga::all();
        return view('admin.kartu_keluarga.edit', compact('kartuKeluarga', 'datawargas'));
    }

    public function update(Request $request, $id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);

        $request->validate([
            'nomor_kk' => 'required|unique:kartu_keluarga,nomor_kk,' . $id,
            'alamat' => 'required',
            'rt_rw' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten_kota' => 'required',
            'kode_pos' => 'required',
            'provinsi' => 'required',
            'kepala_keluarga' => 'required|exists:datawargas,id',
            'anggota' => 'array',
            'anggota.*' => 'exists:datawargas,id',
        ]);

        $kartuKeluarga->update($request->only(['nomor_kk', 'alamat', 'rt_rw', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'kode_pos', 'provinsi', 'kepala_keluarga']));

        if ($request->has('anggota')) {
            $kartuKeluarga->anggotaKeluarga()->sync($request->anggota);
        }

        return redirect()->route('admin.kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $kartuKeluarga->delete();

        return redirect()->route('admin.kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil dihapus.');
    }
}
