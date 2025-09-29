<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::get();
        return view('siswa.index', compact('siswa'));
    }
    public function barcode($id)
    {
        $siswa = Siswa::findOrFail($id);
        $barcode = (new DNS1D)->getBarcodePNG($siswa->id, 'C39');

        return view('siswa.barcode', compact('siswa', 'barcode'));
    }

    public function barcodeAll()
    {
        $siswa = Siswa::all();
        return view('siswa.barcode-all', compact('siswa'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::get();
        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nis' => 'required|string|max:50',
            'Nama' => 'required|string|max:255',
            'Kelas' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // cari dulu datanya
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // cari dulu datanya
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'Nis' => 'required|string|max:50',
            'Nama' => 'required|string|max:255',
            'Kelas' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari dulu datanya
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
