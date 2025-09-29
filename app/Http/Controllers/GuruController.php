<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nip' => 'required|string|max:50',
            'Nama' => 'required|string|max:255',
            'Mapel' => 'required|string|max:100',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nip' => 'required|string|max:50',
            'Nama' => 'required|string|max:255',
            'Mapel' => 'required|string|max:100',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
