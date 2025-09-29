<?php

namespace App\Http\Controllers;

use App\Models\Labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    public function index()
    {
        $labor = Labor::all();
        return view('labor.index', compact('labor'));
    }

    public function create()
    {
        return view('labor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Labor' => 'required|string|max:255',
        ]);

        Labor::create($request->all());

        return redirect()->route('labor.index')->with('success', 'Labor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $labor = Labor::findOrFail($id);
        return view('labor.edit', compact('labor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Labor' => 'required|string|max:255',
        ]);

        $labor = Labor::findOrFail($id);
        $labor->update($request->all());

        return redirect()->route('labor.index')->with('success', 'Labor berhasil diupdate');
    }

    public function destroy($id)
    {
        $labor = Labor::findOrFail($id);
        $labor->delete();

        return redirect()->route('labor.index')->with('success', 'Labor berhasil dihapus');
    }
}
