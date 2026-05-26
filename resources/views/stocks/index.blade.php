@extends('layouts.app')

@section('title', 'Stok Barang')
@section('header-title', 'Stok Barang')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Stok Barang</h2>
        <a href="{{ route('stocks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Stok
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
                    <th class="border border-gray-300 px-4 py-2 text-left">Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Jumlah Stok</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stoks as $stok)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $stok->id_stok }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stok->cabang->nama_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stok->barang->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right font-semibold">{{ $stok->jumlah_stok }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('stocks.edit', $stok->id_stok) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('stocks.destroy', $stok->id_stok) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus stok ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $stoks->links() }}
    </div>
</div>
@endsection