<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::all();
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    public function read()
    {
        return response()->json(Mahasiswa::all());
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json($mahasiswa);
    }

    public function delete($id)
    {
        Mahasiswa::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
