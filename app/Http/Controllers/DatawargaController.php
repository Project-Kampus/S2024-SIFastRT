<?php

namespace App\Http\Controllers;

use App\Models\Datawarga;
use Illuminate\Http\Request;

class DatawargaController extends Controller
{
    // Menampilkan semua data warga
    public function index()
    {
        $warga = Datawarga::all();
        return view('admin.datawarga.index', compact('warga'));
    }

    // Menampilkan form untuk menambah warga baru
    public function create()
    {
        return view('admin.datawarga.create');
    }

    // Menyimpan data warga baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:datawargas,nik|digits:16', // Pastikan validasi sesuai
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:menikah,belum menikah',
        ]);

        Datawarga::create($request->all());

        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    // Menampilkan detail warga berdasarkan id
    public function show($id)
    {
        $warga = Datawarga::findOrFail($id);
        return view('admin.datawarga.show', compact('warga'));
    }

    // Menampilkan form untuk mengedit data warga
    public function edit($id)
    {
        $warga = Datawarga::findOrFail($id);
        return view('admin.datawarga.edit', compact('warga'));
    }

    // Mengupdate data warga
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16|unique:datawargas,nik,' . $id,
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:menikah,belum menikah',
        ]);

        $warga = Datawarga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil diupdate.');
    }

    // Menghapus data warga
    public function destroy($id)
    {
        $warga = Datawarga::findOrFail($id);
        $warga->delete();

        return redirect()->route('admin.datawarga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
