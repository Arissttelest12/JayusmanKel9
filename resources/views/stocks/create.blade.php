@extends('layouts.app')

@section('title', 'Tambah Stok Barang')
@section('header-title', 'Tambah Stok Barang')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Tambah Stok</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
            <select name="id_cabang" id="id_cabang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Cabang --</option>
                @foreach($cabangs as $cabang)
                <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang') == $cabang->id_cabang ? 'selected' : '' }}>{{ $cabang->nama_cabang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_barang" class="block text-sm font-medium text-gray-700">Barang</label>
            <select name="id_barang" id="id_barang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                <option value="{{ $barang->id_barang }}" {{ old('id_barang') == $barang->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="jumlah_stok" class="block text-sm font-medium text-gray-700">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" value="{{ old('jumlah_stok') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" min="0">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('stocks.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
