<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Cabang;
use App\Models\User;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $query = Transaksi::with(['cabang', 'kasir']);
        
        if (Auth::user()->hasRole('kasir')) {
            $query->where('id_cabang', Auth::user()->id_cabang);
        }
        
        $transaksis = $query->latest('tanggal_transaksi')->paginate(15);
        return view('transactions.index', compact('transaksis'));
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->hasRole('kasir')) {
            $cabangs = Cabang::where('id_cabang', $user->id_cabang)->get();
        } else {
            $cabangs = Cabang::all();
        }
        
        $users = User::all();
        return view('transactions.create', compact('cabangs', 'users', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cabang' => 'required|exists:cabang,id_cabang',
            'metode_pembayaran' => 'required|string|max:50',
            'items' => 'required|array|min:1',
            'items.*.id_barang' => 'required|exists:barang,id_barang',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.harga_satuan' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $total_harga = 0;

            // Buat header transaksi
            $transaksi = Transaksi::create([
                'id_cabang' => $validated['id_cabang'],
                'id_kasir' => Auth::id(),
                'tanggal_transaksi' => now()->toDateString(),
                'total_harga' => 0, // Akan diupdate nanti
                'metode_pembayaran' => $validated['metode_pembayaran'],
            ]);

            foreach ($validated['items'] as $item) {
                // Cek Stok
                $stok = StokBarang::where('id_cabang', $validated['id_cabang'])
                    ->where('id_barang', $item['id_barang'])
                    ->first();

                if (!$stok || $stok->jumlah_stok < $item['jumlah']) {
                    throw new \Exception("Stok tidak mencukupi untuk barang ID: {$item['id_barang']}");
                }

                $subtotal = $item['jumlah'] * $item['harga_satuan'];
                $total_harga += $subtotal;

                // Simpan detail transaksi
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_barang' => $item['id_barang'],
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $item['harga_satuan'],
                    'subtotal' => $subtotal,
                ]);

                // Kurangi stok
                $stok->decrement('jumlah_stok', $item['jumlah']);
            }

            // Update total harga
            $transaksi->update(['total_harga' => $total_harga]);

            DB::commit();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage())->withInput();
        }
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

    public function validateTransaksi(Request $request, Transaksi $transaksi)
    {
        // Require validate_transactions permission
        if (!Auth::user()->can('validate_transactions')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'status_validasi' => 'required|in:pending,valid,invalid',
        ]);

        $transaksi->update(['status_validasi' => $validated['status_validasi']]);

        return redirect()->route('transactions.index')->with('success', 'Status validasi transaksi berhasil diperbarui.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->detailTransaksi()->delete();
        $transaksi->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function getBarangByCabang($id_cabang)
    {
        $stokBarangs = StokBarang::with('barang')
            ->where('id_cabang', $id_cabang)
            ->where('jumlah_stok', '>', 0)
            ->get();

        $barangs = $stokBarangs->map(function ($stok) {
            return [
                'id_barang' => $stok->barang->id_barang,
                'kode_barang' => $stok->barang->kode_barang,
                'nama_barang' => $stok->barang->nama_barang,
                'harga_jual' => $stok->barang->harga_jual,
                'stok' => $stok->jumlah_stok,
            ];
        });

        return response()->json($barangs);
    }
}
