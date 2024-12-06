<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return Dosen::all();
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens',
            'email' => 'required|email|unique:dosens',
        ]);

        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    public function read()
    {
        return response()->json(Dosen::all());
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen);
    }

    public function delete($id)
    {
        Dosen::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
