@extends('layouts.app')

@section('title', 'Transaksi')
@section('header-title', 'Transaksi')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Transaksi</h2>
        <a href="{{ route('transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Transaksi
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Cabang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kasir</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Total Harga</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Metode Pembayaran</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $transaksi)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->id_transaksi }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->cabang->nama_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->kasir->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tanggal_transaksi->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaksi->metode_pembayaran }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('transactions.show', $transaksi->id_transaksi) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 inline-block">Lihat</a>
                        <a href="{{ route('transactions.edit', $transaksi->id_transaksi) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaksi->id_transaksi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $transaksis->links() }}
    </div>
</div>
@endsection