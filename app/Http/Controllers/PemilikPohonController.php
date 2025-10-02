<?php

namespace App\Http\Controllers;

use App\Models\PemilikPohon;
use Illuminate\Http\Request;

class PemilikPohonController extends Controller
{
    public function index()
    {
        return PemilikPohon::with('pohon')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required|string',
            'umur_pemilik' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P'
        ]);

        $pemilik = PemilikPohon::create($request->all());
        return response()->json($pemilik, 201);
    }

    public function show($id)
    {
        return PemilikPohon::with('pohon')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pemilik = PemilikPohon::findOrFail($id);
        $pemilik->update($request->all());
        return response()->json($pemilik, 200);
    }

    public function destroy($id)
    {
        PemilikPohon::destroy($id);
        return response()->json(null, 204);
    }
}
