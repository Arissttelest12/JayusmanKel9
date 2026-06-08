<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Laporan Management</h2>
    </x-slot>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 transition-colors duration-300">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Daftar Laporan</h2>
            <div class="space-x-2 reports-actions">
                <a href="{{ route('reports.export.pdf','penjualan') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded">Export PDF</a>
                <a href="{{ route('reports.export.excel','penjualan') }}" class="inline-flex items-center px-4 py-2 bg-teal-600 text-white rounded">Export Excel</a>
            </div>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('reports.view','penjualan') }}" class="mb-6">
                <div class="flex gap-3 items-end">
                    <div>
                        <label class="block text-sm">Dari</label>
                        <input type="date" name="from" class="border rounded px-2 py-1">
                    </div>
                    <div>
                        <label class="block text-sm">Sampai</label>
                        <input type="date" name="to" class="border rounded px-2 py-1">
                    </div>
                    <div>
                        <label class="block text-sm">Jenis Laporan</label>
                        <select id="type_select" onchange="changeTarget()" class="border rounded px-2 py-1">
                            <option value="penjualan">Penjualan</option>
                            <option value="stok">Stok</option>
                            <option value="transaksi">Transaksi</option>
                            <option value="cabang">Cabang</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Lihat</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="bg-white rounded border reports-list">
            <table class="min-w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3">NO</th>
                        <th class="px-6 py-3">JENIS LAPORAN</th>
                        <th class="px-6 py-3">PERIODE</th>
                        <th class="px-6 py-3">TOTAL</th>
                        <th class="px-6 py-3">TANGGAL DIBUAT</th>
                        <th class="px-6 py-3">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $reports = [
                            'penjualan' => 'Laporan Penjualan',
                            'stok' => 'Laporan Stok',
                            'transaksi' => 'Laporan Transaksi',
                            'cabang' => 'Laporan Cabang',
                            'user' => 'Laporan User',
                        ];
                        $i = 1;
                    @endphp

                    @foreach($reports as $key => $label)
                    <tr class="border-t hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                        <td class="px-6 py-4 text-center">{{ $i++ }}</td>
                        <td class="px-6 py-4 font-medium">{{ $label }}</td>
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4 font-semibold">-</td>
                        <td class="px-6 py-4">-</td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('reports.view', $key) }}" class="text-teal-600">Lihat</a>
                            <a href="{{ route('reports.export.pdf', $key) }}?from=&to=" class="text-emerald-600">Download PDF</a>
                            <a href="{{ route('reports.export.excel', $key) }}?from=&to=" class="text-emerald-600">Download Excel</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function changeTarget(){
            var t = document.getElementById('type_select').value;
            document.querySelector('form').action = '/reports/view/' + t;
        }
    </script>
</x-app-layout>
