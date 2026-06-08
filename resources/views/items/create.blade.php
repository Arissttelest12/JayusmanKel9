@extends('layouts.app')

@section('title', 'Tambah Barang')
@section('header-title', 'Tambah Barang')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Tambah Barang</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="harga_beli" class="block text-sm font-medium text-gray-700">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" step="0.01" value="{{ old('harga_beli') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" step="0.01" value="{{ old('harga_jual') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="mb-6">
            <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
            <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., pcs, box, kg">
        </div>

        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Informasi Stok Awal (Opsional)</h3>
        
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
                <select name="id_cabang" id="id_cabang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Cabang --</option>
                    @foreach($cabangs as $cabang)
                    <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang', auth()->user()->id_cabang) == $cabang->id_cabang ? 'selected' : '' }}>{{ $cabang->nama_cabang }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Pilih cabang untuk lokasi stok awal.</p>
            </div>
            <div>
                <label for="jumlah_stok" class="block text-sm font-medium text-gray-700">Jumlah Stok Awal</label>
                <input type="number" name="jumlah_stok" id="jumlah_stok" value="{{ old('jumlah_stok', 0) }}" min="0" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-500 mt-1">Biarkan 0 jika tidak ingin menambahkan stok awal saat ini.</p>
            </div>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('items.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
