@extends('layouts.app')

@section('title', 'Detail Transaksi')
@section('header-title', 'Detail Transaksi')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Detail Transaksi #{{ $transaksi->id_transaksi }}</h2>
        <a href="{{ route('transactions.index') }}" class="text-blue-600 hover:text-blue-800">← Kembali ke Daftar</a>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-gray-600">Cabang</p>
            <p class="font-semibold">{{ $transaksi->cabang->nama_cabang }}</p>
        </div>
        <div>
            <p class="text-gray-600">Kasir</p>
            <p class="font-semibold">{{ $transaksi->kasir->name }}</p>
        </div>
        <div>
            <p class="text-gray-600">Tanggal Transaksi</p>
            <p class="font-semibold">{{ $transaksi->tanggal_transaksi->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-gray-600">Metode Pembayaran</p>
            <p class="font-semibold">{{ $transaksi->metode_pembayaran }}</p>
        </div>
    </div>

    <h3 class="text-xl font-bold mb-4">Detail Item</h3>
    <div class="overflow-x-auto mb-6">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Harga Satuan</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi->detailTransaksi as $detail)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $detail->barang->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">{{ $detail->jumlah }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada detail transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="bg-gray-100 p-4 rounded">
        <div class="flex justify-between items-center">
            <span class="text-lg font-semibold">Total Harga:</span>
            <span class="text-2xl font-bold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
@endsection
