<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('branches.index', compact('cabangs'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        Cabang::create($validated);
        return redirect()->route('branches.index')->with('success', 'Cabang berhasil ditambahkan');
    }

    public function edit(Cabang $cabang)
    {
        return view('branches.edit', compact('cabang'));
    }

    public function update(Request $request, Cabang $cabang)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        $cabang->update($validated);
        return redirect()->route('branches.index')->with('success', 'Cabang berhasil diperbarui');
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();
        return redirect()->route('branches.index')->with('success', 'Cabang berhasil dihapus');
    }
}
