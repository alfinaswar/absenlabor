<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\absenHead;
use App\Models\absensi;
use App\Models\Labor;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absen = absenHead::get();

        return view('absensi.index', compact('absen'));
    }
    public function create()
    {
        // Ambil semua data labor untuk dropdown
        $labors = Labor::all();
        return view('absensi.create', compact('labors'));
    }
    public function scan(Request $request)
    {
        // dd($request->labor_id);
        $request->validate([
            'absen_id' => 'required|string',
            'siswa_id' => 'required|string',
            'labor_id' => 'required|string',
        ]);

        // Cek apakah siswa valid
        $siswa = Siswa::where('id', $request->siswa_id)->first();
        if (!$siswa) {
            return response()->json(['success' => false, 'message' => 'Siswa tidak ditemukan']);
        }

        $exists = absensi::where('id_absen', $request->absen_id)
            ->where('siswa_id', $siswa->id)
            ->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'Siswa sudah absen']);
        }

        // dd($request->absen_id);
        $absenhead = absensi::where('id', $request->absen_id)->first();
        absensi::create([
            'id_absen' => $absenhead->id,
            'siswa_id' => $siswa->id,
            'labor_id' => $siswa->labor_id,
            'waktu' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => $siswa->nama . ' berhasil absen',
            'siswa' => $siswa
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'IdLabor' => 'required',
            'Tanggal' => 'required|date',
            'Guru' => 'required|string|max:255',
        ]);

        // Simpan data absen
        $absen = absenHead::create([
            'IdLabor' => $request->IdLabor,
            'Tanggal' => $request->Tanggal,
            'Guru' => $request->Guru,
        ]);

        return redirect()->route('absen.create')->with('absen_id', $absen->id);
    }
}
