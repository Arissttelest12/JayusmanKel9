@extends('layouts.app')

@section('title', 'Edit Kategori Barang')
@section('header-title', 'Edit Kategori Barang')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-md">
    <h2 class="text-2xl font-bold mb-6">Form Edit Kategori</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categories.update', $kategoriBarang->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategoriBarang->nama_kategori }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('categories.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
