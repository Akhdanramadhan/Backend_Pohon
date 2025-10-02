<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function index()
    {
        return Pohon::with('pemilik')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pohon' => 'required|string',
            'jenis_pohon' => 'required|string',
            'umur_pohon' => 'required|integer',
            'tinggi_pohon' => 'required|numeric',
            'lokasi_pohon' => 'required|string',
            'id_pemilik' => 'required|exists:pemilik_pohon,id'
        ]);

        $pohon = Pohon::create($request->all());
        return response()->json($pohon, 201);
    }

    public function show($id)
    {
        return Pohon::with('pemilik')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pohon = Pohon::findOrFail($id);
        $pohon->update($request->all());
        return response()->json($pohon, 200);
    }

    public function destroy($id)
    {
        Pohon::destroy($id);
        return response()->json(null, 204);
    }
}
