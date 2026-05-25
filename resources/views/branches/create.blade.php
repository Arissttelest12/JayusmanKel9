@extends('layouts.app')

@section('title', 'Tambah Cabang')
@section('header-title', 'Tambah Cabang')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-md">
    <h2 class="text-2xl font-bold mb-6">Form Tambah Cabang</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_cabang" class="block text-sm font-medium text-gray-700">Nama Cabang</label>
            <input type="text" name="nama_cabang" id="nama_cabang" value="{{ old('nama_cabang') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
            <input type="text" name="kota" id="kota" value="{{ old('kota') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('alamat') }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('branches.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
