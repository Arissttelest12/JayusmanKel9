<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->paginate(15);
        return view('items.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = KategoriBarang::all();
        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = \App\Models\Cabang::all();
        } else {
            $cabangs = \App\Models\Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
        return view('items.create', compact('kategoris', 'cabangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori_barang,id_kategori',
            'kode_barang' => 'required|string|max:50|unique:barang',
            'nama_barang' => 'required|string|max:100',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:30',
            'id_cabang' => 'nullable|exists:cabang,id_cabang',
            'jumlah_stok' => 'nullable|integer|min:0',
        ]);

        $barangData = collect($validated)->except(['id_cabang', 'jumlah_stok'])->toArray();
        $barang = Barang::create($barangData);

        if ($request->filled('id_cabang') && $request->filled('jumlah_stok') && $request->jumlah_stok > 0) {
            \App\Models\StokBarang::create([
                'id_cabang' => $request->id_cabang,
                'id_barang' => $barang->id_barang,
                'jumlah_stok' => $request->jumlah_stok,
            ]);

            \App\Models\StokMasuk::create([
                'id_cabang' => $request->id_cabang,
                'id_barang' => $barang->id_barang,
                'id_user' => auth()->id(),
                'jumlah' => $request->jumlah_stok,
                'tanggal_masuk' => now()->toDateString(),
                'keterangan' => 'Stok awal barang baru',
            ]);
        }

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            abort(403, 'Hanya Owner yang dapat mengubah data barang secara keseluruhan.');
        }
        $kategoris = KategoriBarang::all();
        return view('items.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            abort(403, 'Hanya Owner yang dapat mengubah data barang secara keseluruhan.');
        }
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori_barang,id_kategori',
            'kode_barang' => 'required|string|max:50|unique:barang,kode_barang,' . $barang->id_barang . ',id_barang',
            'nama_barang' => 'required|string|max:100',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan' => 'required|string|max:30',
        ]);

        $barang->update($validated);
        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            abort(403, 'Hanya Owner yang dapat menghapus data barang secara keseluruhan.');
        }
        $barang->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus');
    }
}
