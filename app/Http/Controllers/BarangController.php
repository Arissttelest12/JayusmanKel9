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
        return view('items.create', compact('kategoris'));
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
        ]);

        Barang::create($validated);
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        $kategoris = KategoriBarang::all();
        return view('items.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
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
        $barang->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus');
    }
}
