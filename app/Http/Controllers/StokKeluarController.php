<?php

namespace App\Http\Controllers;

use App\Models\StokKeluar;
use App\Models\Cabang;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    public function index()
    {
        $query = StokKeluar::with(['cabang', 'barang', 'user']);
        if (!auth()->user()->hasRole(['owner', 'Owner'])) {
            $query->where('id_cabang', auth()->user()->id_cabang);
        }
        $stokkeluars = $query->paginate(15);
        return view('stock-out.index', compact('stokkeluars'));
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
        return view('stock-out.create', compact('cabangs', 'barangs', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);

        StokKeluar::create($validated);
        return redirect()->route('stock-out.index')->with('success', 'Stok keluar berhasil ditambahkan');
    }

    public function edit(StokKeluar $stokKeluar)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokKeluar->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

        if (auth()->user()->hasRole(['owner', 'Owner'])) {
            $cabangs = Cabang::all();
        } else {
            $cabangs = Cabang::where('id_cabang', auth()->user()->id_cabang)->get();
        }
        $barangs = Barang::all();
        $users = User::all();
        return view('stock-out.edit', compact('stokKeluar', 'cabangs', 'barangs', 'users'));
    }

    public function update(Request $request, StokKeluar $stokKeluar)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokKeluar->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }

        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_barang' => 'required|exists:barang,id_barang',
            'id_user' => 'required|exists:users,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'alasan' => 'nullable|string|max:255',
        ]);

        $stokKeluar->update($validated);
        return redirect()->route('stock-out.index')->with('success', 'Stok keluar berhasil diperbarui');
    }

    public function destroy(StokKeluar $stokKeluar)
    {
        if (!auth()->user()->hasRole(['owner', 'Owner']) && $stokKeluar->id_cabang !== auth()->user()->id_cabang) {
            abort(403, 'Akses terbatas ke cabang lain.');
        }
        $stokKeluar->delete();
        return redirect()->route('stock-out.index')->with('success', 'Stok keluar berhasil dihapus');
    }
}
