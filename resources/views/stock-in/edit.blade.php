@extends('layouts.app')

@section('title', 'Edit Stok Masuk')
@section('header-title', 'Edit Stok Masuk')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Edit Stok Masuk</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('stock-in.update', $stokMasuk->id_stok_masuk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
            <select name="id_cabang" id="id_cabang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Cabang --</option>
                @foreach($cabangs as $cabang)
                <option value="{{ $cabang->id_cabang }}" {{ $stokMasuk->id_cabang == $cabang->id_cabang ? 'selected' : '' }}>{{ $cabang->nama_cabang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_barang" class="block text-sm font-medium text-gray-700">Barang</label>
            <select name="id_barang" id="id_barang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                <option value="{{ $barang->id_barang }}" {{ $stokMasuk->id_barang == $barang->id_barang ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_user" class="block text-sm font-medium text-gray-700">User</label>
            <select name="id_user" id="id_user" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $stokMasuk->id_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ $stokMasuk->jumlah }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" min="1">
        </div>

        <div class="mb-4">
            <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ $stokMasuk->tanggal_masuk->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $stokMasuk->keterangan }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('stock-in.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
