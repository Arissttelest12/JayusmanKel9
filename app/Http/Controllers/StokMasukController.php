<?php

namespace App\Http\Controllers;

use App\Models\StokMasuk;
use App\Models\Cabang;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    public function index()
    {
        $stokmasuks = StokMasuk::with(['cabang', 'barang', 'user'])->paginate(15);
        return view('stock-in.index', compact('stokmasuks'));
    }

    public function create()
    {
        $cabangs = Cabang::all();
        $barangs = Barang::all();
        $users = User::all();
        return view('stock-in.create', compact('cabangs', 'barangs', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        StokMasuk::create($validated);
        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil ditambahkan');
    }

    public function edit(StokMasuk $stokMasuk)
    {
        $cabangs = Cabang::all();
        $barangs = Barang::all();
        $users = User::all();
        return view('stock-in.edit', compact('stokMasuk', 'cabangs', 'barangs', 'users'));
    }

    public function update(Request $request, StokMasuk $stokMasuk)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $stokMasuk->update($validated);
        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil diperbarui');
    }

    public function destroy(StokMasuk $stokMasuk)
    {
        $stokMasuk->delete();
        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil dihapus');
    }
}
