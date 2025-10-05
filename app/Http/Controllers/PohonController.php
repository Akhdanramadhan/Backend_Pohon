<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function index()
    {
        $pohon = Pohon::with('pemilik')->get();
        return view('pohon.index', compact('pohon'));
    }

    public function create()
    {
        $pemilik = \App\Models\PemilikPohon::all();
        return view('pohon.create', compact('pemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pohon' => 'required|string',
            'jenis_pohon' => 'required|string',
            'tanggal_tanam' => 'nullable|date|before_or_equal:today',
            'tinggi_pohon' => 'nullable|numeric',
            'satuan_tinggi' => 'required|string|in:m,cm',
            'lokasi_pohon' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'id_pemilik' => 'required|exists:pemilik_pohon,id',
        ]);

        Pohon::create($request->all());
        return redirect()->route('pohon.index')->with('success', 'Pohon berhasil ditambahkan');
    }

    public function show(Pohon $pohon)
    {
        $pohon->load('pemilik');
        return view('pohon.show', compact('pohon'));
    }

    public function edit(Pohon $pohon)
    {
        $pemilik = \App\Models\PemilikPohon::all();
        return view('pohon.edit', compact('pohon', 'pemilik'));
    }

    public function update(Request $request, Pohon $pohon)
    {
        $request->validate([
            'nama_pohon' => 'required|string',
            'jenis_pohon' => 'required|string',
            'tanggal_tanam' => 'nullable|date|before_or_equal:today',
            'tinggi_pohon' => 'nullable|numeric',
            'satuan_tinggi' => 'required|string|in:m,cm',
            'lokasi_pohon' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'id_pemilik' => 'required|exists:pemilik_pohon,id',
        ]);

        $pohon->update($request->all());
        return redirect()->route('pohon.index')->with('success', 'Data pohon berhasil diperbarui');
    }

    public function destroy(Pohon $pohon)
    {
        $pohon->delete();
        return redirect()->route('pohon.index')->with('success', 'Data pohon berhasil dihapus');
    }
}
