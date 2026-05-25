@extends('layouts.app')

@section('title', 'Stok Masuk')
@section('header-title', 'Stok Masuk')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Stok Masuk</h2>
        <a href="{{ route('stock-in.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Stok Masuk
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
                    <th class="border border-gray-300 px-4 py-2 text-left">User</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Masuk</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Keterangan</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokmasuks as $stokmasuk)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->id_stok_masuk }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->cabang->nama_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->barang->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">{{ $stokmasuk->jumlah }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->tanggal_masuk->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokmasuk->keterangan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('stock-in.edit', $stokmasuk->id_stok_masuk) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('stock-in.destroy', $stokmasuk->id_stok_masuk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus stok masuk ini?')">Hapus</button>
                        </form>
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
        {{ $stokmasuks->links() }}
    </div>
</div>
@endsection
