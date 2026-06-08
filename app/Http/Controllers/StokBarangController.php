<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use App\Models\Cabang;
use App\Models\Barang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    public function index()
    {
        $query = StokBarang::with(['cabang', 'barang']);
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            $query->where('id_cabang', auth()->user()->id_cabang);
        }
        $stoks = $query->paginate(15);
        return view('stocks.index', compact('stoks'));
    }

    public function create()
    {
        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = Cabang::all();
        } else {
            $cabangs = Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
        $barangs = Barang::all();
        return view('stocks.create', compact('cabangs', 'barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        StokBarang::create($validated);
        return redirect()->route('stocks.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function edit(StokBarang $stokBarang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokBarang->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = Cabang::all();
        } else {
            $cabangs = Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
        $barangs = Barang::all();
        return view('stocks.edit', compact('stokBarang', 'cabangs', 'barangs'));
    }

    public function update(Request $request, StokBarang $stokBarang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokBarang->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        $stokBarang->update($validated);
        return redirect()->route('stocks.index')->with('success', 'Stok berhasil diperbarui');
    }

    public function destroy(StokBarang $stokBarang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokBarang->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }
        $stokBarang->delete();
        return redirect()->route('stocks.index')->with('success', 'Stok berhasil dihapus');
    }
}
