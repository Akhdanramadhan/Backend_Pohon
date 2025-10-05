<?php

namespace App\Http\Controllers;

use App\Models\PemilikPohon;
use Illuminate\Http\Request;

class PemilikPohonController extends Controller
{
    /**
     * Tampilkan daftar pemilik pohon
     */
    public function index()
    {
        $pemilik = PemilikPohon::all();
        return view('pemilik.index', compact('pemilik'));
    }

    /**
     * Tampilkan form tambah pemilik pohon
     */
    public function create()
    {
        return view('pemilik.create');
    }

    /**
     * Simpan data pemilik pohon baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'umur_pemilik' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        PemilikPohon::create($request->all());

        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit pemilik pohon
     */
    public function edit(PemilikPohon $pemilik)
    {
        return view('pemilik.edit', compact('pemilik'));
    }

    /**
     * Update data pemilik pohon
     */
    public function update(Request $request, PemilikPohon $pemilik)
    {
        $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'umur_pemilik' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $pemilik->update($request->all());

        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil diperbarui');
    }

    /**
     * Hapus pemilik pohon
     */
    public function destroy(PemilikPohon $pemilik)
    {
        $pemilik->delete();
        return redirect()->route('pemilik.index')->with('success', 'Data pemilik berhasil dihapus');
    }

    /**
     * Tampilkan detail pemilik pohon
     */
    public function show(PemilikPohon $pemilik)
    {
        return view('pemilik.show', compact('pemilik'));
    }
}
