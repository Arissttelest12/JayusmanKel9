<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Cabang;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['cabang', 'kasir'])->paginate(15);
        return view('transactions.index', compact('transaksis'));
    }

    public function create()
    {
        $cabangs = Cabang::all();
        $users = User::all();
        return view('transactions.create', compact('cabangs', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_kasir' => 'required|exists:users,id',
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:50',
        ]);

        Transaksi::create($validated);
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['detailTransaksi.barang', 'cabang', 'kasir']);
        return view('transactions.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $cabangs = Cabang::all();
        $users = User::all();
        return view('transactions.edit', compact('transaksi', 'cabangs', 'users'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'id_kasir' => 'required|exists:users,id',
            'tanggal_transaksi' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:50',
        ]);

        $transaksi->update($validated);
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->detailTransaksi()->delete();
        $transaksi->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
