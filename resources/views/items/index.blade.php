@extends('layouts.app')

@section('title', 'Barang')
@section('header-title', 'Barang')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Barang</h2>
        <a href="{{ route('items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Barang
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
                    <th class="border border-gray-300 px-4 py-2 text-left">Kode</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kategori</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Harga Beli</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Harga Jual</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Satuan</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->id_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->kode_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->kategori->nama_kategori }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->satuan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @hasanyrole('owner|Owner')
                        <a href="{{ route('items.edit', $barang->id_barang) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('items.destroy', $barang->id_barang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                        </form>
                        @else
                        <span class="text-gray-400 text-xs italic">Akses Terbatas</span>
                        @endhasanyrole
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $barangs->links() }}
    </div>
</div>
@endsection
