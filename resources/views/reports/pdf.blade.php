<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan {{ $type }}</title>
    <style>
        body{ font-family: sans-serif; font-size:12px }
        table{ width:100%; border-collapse:collapse }
        th,td{ border:1px solid #ccc; padding:6px }
    </style>
</head>
<body>
    <h3>Laporan {{ ucfirst($type) }}</h3>
    <table>
        <thead>
            <tr>
                @if($type === 'stok')
                    <th>ID Stok</th><th>Cabang</th><th>Barang</th><th>Jumlah</th>
                @elseif($type === 'penjualan')
                    <th>ID</th><th>Cabang</th><th>Kasir</th><th>Tanggal</th><th>Total</th>
                @else
                    <th>ID</th><th>Cabang</th><th>Kasir</th><th>Tanggal</th><th>Total</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    @if($type === 'stok')
                        <td>{{ $row->id_stok }}</td>
                        <td>{{ $row->id_cabang }}</td>
                        <td>{{ $row->barang?->nama_barang ?? ($row['nama_barang'] ?? '-') }}</td>
                        <td>{{ $row->jumlah_stok ?? $row['jumlah_stok'] }}</td>
                    @elseif($type === 'penjualan')
                        <td>{{ $row->id_transaksi }}</td>
                        <td>{{ $row->cabang_name ?? $row->id_cabang }}</td>
                        <td>{{ $row->kasir_name ?? $row->id_kasir }}</td>
                        <td>{{ $row->tanggal_transaksi }}</td>
                        <td>{{ $row->total_harga }}</td>
                    @else
                        <td>{{ $row->id_transaksi }}</td>
                        <td>{{ $row->id_cabang }}</td>
                        <td>{{ $row->id_kasir }}</td>
                        <td>{{ $row->tanggal_transaksi }}</td>
                        <td>{{ $row->total_harga }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
