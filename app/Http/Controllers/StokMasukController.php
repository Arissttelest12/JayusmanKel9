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
        $query = StokMasuk::with(['cabang', 'barang', 'user']);
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            $query->where('id_cabang', auth()->user()->id_cabang);
        }
        $stokmasuks = $query->paginate(15);
        return view('stock-in.index', compact('stokmasuks'));
    }

    public function create()
    {
        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = Cabang::all();
        } else {
            $cabangs = Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
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
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokMasuk->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = Cabang::all();
        } else {
            $cabangs = Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
        $barangs = Barang::all();
        $users = User::all();
        return view('stock-in.edit', compact('stokMasuk', 'cabangs', 'barangs', 'users'));
    }

    public function update(Request $request, StokMasuk $stokMasuk)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokMasuk->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

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
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokMasuk->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }
        $stokMasuk->delete();
        return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil dihapus');
    }
}
