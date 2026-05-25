@extends('layouts.app')

@section('title', 'Stok Keluar')
@section('header-title', 'Stok Keluar')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Stok Keluar</h2>
        <a href="{{ route('stock-out.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Stok Keluar
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
                    <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Keluar</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Alasan</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokkeluars as $stokkeluar)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->id_stok_keluar }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->cabang->nama_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->barang->nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">{{ $stokkeluar->jumlah }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->tanggal_keluar->format('d/m/Y') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $stokkeluar->alasan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('stock-out.edit', $stokkeluar->id_stok_keluar) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('stock-out.destroy', $stokkeluar->id_stok_keluar) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus stok keluar ini?')">Hapus</button>
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
        {{ $stokkeluars->links() }}
    </div>
</div>
@endsection
