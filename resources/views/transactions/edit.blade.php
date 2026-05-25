@extends('layouts.app')

@section('title', 'Edit Transaksi')
@section('header-title', 'Edit Transaksi')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg">
    <h2 class="text-2xl font-bold mb-6">Form Edit Transaksi</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('transactions.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="id_cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
            <select name="id_cabang" id="id_cabang" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Cabang --</option>
                @foreach($cabangs as $cabang)
                <option value="{{ $cabang->id_cabang }}" {{ $transaksi->id_cabang == $cabang->id_cabang ? 'selected' : '' }}>{{ $cabang->nama_cabang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_kasir" class="block text-sm font-medium text-gray-700">Kasir</label>
            <select name="id_kasir" id="id_kasir" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- Pilih Kasir --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $transaksi->id_kasir == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="total_harga" class="block text-sm font-medium text-gray-700">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" step="0.01" value="{{ $transaksi->total_harga }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" min="0">
        </div>

        <div class="mb-6">
            <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ $transaksi->metode_pembayaran }}" class="w-full px-3 py-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('transactions.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
