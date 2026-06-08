@extends('layouts.app')

@section('title', 'Preview Laporan')
@section('header-title', 'Preview Laporan')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <style>
        /* Ensure export buttons and links are clickable above overlays */
        .reports-actions a, .reports-table a { position: relative; z-index: 9999; pointer-events: auto; }
    </style>
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-bold">Laporan: {{ ucfirst($type) }}</h3>
        <div class="space-x-2">
            <a href="{{ route('reports.export.pdf', $type) }}?from={{ $queryParams['from'] ?? '' }}&to={{ $queryParams['to'] ?? '' }}" class="px-3 py-2 bg-gray-800 text-white rounded">Export PDF</a>
            <a href="{{ route('reports.export.excel', $type) }}?from={{ $queryParams['from'] ?? '' }}&to={{ $queryParams['to'] ?? '' }}" class="px-3 py-2 bg-green-700 text-white rounded">Export Excel</a>
        </div>
    </div>

    <div class="overflow-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-slate-50">
                    @if($type === 'stok')
                        <th class="px-4 py-2">ID Stok</th>
                        <th class="px-4 py-2">Cabang</th>
                        <th class="px-4 py-2">Barang</th>
                        <th class="px-4 py-2">Jumlah</th>
                    @else
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Cabang</th>
                        <th class="px-4 py-2">Kasir</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Total</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        @if($type === 'stok')
                            <td class="px-4 py-2">{{ $row->id_stok }}</td>
                            <td class="px-4 py-2">{{ $row->id_cabang }}</td>
                            <td class="px-4 py-2">{{ $row->barang?->nama_barang ?? ($row['nama_barang'] ?? '-') }}</td>
                            <td class="px-4 py-2">{{ $row->jumlah_stok ?? $row['jumlah_stok'] }}</td>
                        @else
                            <td class="px-4 py-2">
                                @if($type === 'transaksi')
                                    <a href="{{ route('transactions.show', $row->id_transaksi) }}" class="text-blue-600">{{ $row->id_transaksi }}</a>
                                @else
                                    {{ $row->id_transaksi }}
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $row->id_cabang }}</td>
                            <td class="px-4 py-2">{{ $row->id_kasir }}</td>
                            <td class="px-4 py-2">{{ $row->tanggal_transaksi }}</td>
                            <td class="px-4 py-2">{{ $row->total_harga }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
