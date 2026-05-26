<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Laporan Management</h2>
    </x-slot>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-slate-800">Daftar Laporan</h2>
            <div class="space-x-2">
                <x-button variant="success">Export PDF</x-button>
                <x-button variant="primary">Export Excel</x-button>
            </div>
        </div>
        <x-table :headers="['No', 'Jenis Laporan', 'Periode', 'Total', 'Tanggal Dibuat', 'Aksi']">
            <tr>
                <td class="py-4 px-6 border-b border-slate-100 text-center text-slate-700">1</td>
                <td class="py-4 px-6 border-b border-slate-100 font-medium text-slate-700">Laporan Penjualan</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Maret 2026</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Rp 45.000.000</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">2026-04-01</td>
                <td class="py-4 px-6 border-b border-slate-100 text-center">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text" class="ml-2">Download</x-button>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-slate-100 text-center text-slate-700">2</td>
                <td class="py-4 px-6 border-b border-slate-100 font-medium text-slate-700">Laporan Stok</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Maret 2026</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">342 Item</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">2026-04-01</td>
                <td class="py-4 px-6 border-b border-slate-100 text-center">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text" class="ml-2">Download</x-button>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-slate-100 text-center text-slate-700">3</td>
                <td class="py-4 px-6 border-b border-slate-100 font-medium text-slate-700">Laporan Transaksi</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Maret 2026</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">125 Transaksi</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">2026-04-01</td>
                <td class="py-4 px-6 border-b border-slate-100 text-center">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text" class="ml-2">Download</x-button>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-slate-100 text-center text-slate-700">4</td>
                <td class="py-4 px-6 border-b border-slate-100 font-medium text-slate-700">Laporan Cabang</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Maret 2026</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">3 Cabang</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">2026-04-01</td>
                <td class="py-4 px-6 border-b border-slate-100 text-center">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text" class="ml-2">Download</x-button>
                </td>
            </tr>
            <tr>
                <td class="py-4 px-6 border-b border-slate-100 text-center text-slate-700">5</td>
                <td class="py-4 px-6 border-b border-slate-100 font-medium text-slate-700">Laporan User</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">Maret 2026</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">8 User</td>
                <td class="py-4 px-6 border-b border-slate-100 text-slate-700">2026-04-01</td>
                <td class="py-4 px-6 border-b border-slate-100 text-center">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text" class="ml-2">Download</x-button>
                </td>
            </tr>
        </x-table>
    </div>
</x-app-layout>