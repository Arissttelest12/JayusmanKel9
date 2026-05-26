@extends('layouts.app')

@section('title', 'Cabang Toko')
@section('header-title', 'Cabang Toko')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Cabang</h2>
        <a href="{{ route('branches.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Cabang
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
                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Cabang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kota</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Alamat</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cabangs as $cabang)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $cabang->id_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $cabang->nama_cabang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $cabang->kota }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $cabang->alamat }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('branches.edit', $cabang->id_cabang) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600 inline-block">Edit</a>
                        <form action="{{ route('branches.destroy', $cabang->id_cabang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" onclick="return confirm('Hapus cabang ini?')">Hapus</button>
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
</div>
@endsection