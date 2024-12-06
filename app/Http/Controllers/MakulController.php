<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function index()
    {
        return Makul::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_makul' => 'required|string|max:255',
            'sks' => 'required|integer|unique:makuls',
        ]);

        $makul = Makul::create($request->all());
        return response()->json($makul, 201);
    }

    public function read()
    {
        return response()->json(Makul::all());
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());
        return response()->json($makul);
    }

    public function delete($id)
    {
        Makul::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
