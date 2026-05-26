<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Laporan Management</h2>
    </x-slot>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 transition-colors duration-300">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Daftar Laporan</h2>
            <div class="space-x-2">
                <x-button variant="success">Export PDF</x-button>
                <x-button variant="primary">Export Excel</x-button>
            </div>
        </div>
        <x-table :headers="['No', 'Jenis Laporan', 'Periode', 'Total', 'Tanggal Dibuat', 'Aksi']">
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">1</td>
                <td class="px-6 py-4 font-medium">Laporan Penjualan</td>
                <td class="px-6 py-4">Maret 2026</td>
                <td class="px-6 py-4 font-semibold">Rp 45.000.000</td>
                <td class="px-6 py-4">2026-04-01</td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text">Download</x-button>
                </td>
            </tr>
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">2</td>
                <td class="px-6 py-4 font-medium">Laporan Stok</td>
                <td class="px-6 py-4">Maret 2026</td>
                <td class="px-6 py-4 font-semibold">342 Item</td>
                <td class="px-6 py-4">2026-04-01</td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text">Download</x-button>
                </td>
            </tr>
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">3</td>
                <td class="px-6 py-4 font-medium">Laporan Transaksi</td>
                <td class="px-6 py-4">Maret 2026</td>
                <td class="px-6 py-4 font-semibold">125 Transaksi</td>
                <td class="px-6 py-4">2026-04-01</td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text">Download</x-button>
                </td>
            </tr>
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">4</td>
                <td class="px-6 py-4 font-medium">Laporan Cabang</td>
                <td class="px-6 py-4">Maret 2026</td>
                <td class="px-6 py-4 font-semibold">3 Cabang</td>
                <td class="px-6 py-4">2026-04-01</td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text">Download</x-button>
                </td>
            </tr>
            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                <td class="px-6 py-4 text-center">5</td>
                <td class="px-6 py-4 font-medium">Laporan User</td>
                <td class="px-6 py-4">Maret 2026</td>
                <td class="px-6 py-4 font-semibold">8 User</td>
                <td class="px-6 py-4">2026-04-01</td>
                <td class="px-6 py-4 flex justify-center space-x-2">
                    <x-button variant="primary-text">Lihat</x-button>
                    <x-button variant="success-text">Download</x-button>
                </td>
            </tr>
        </x-table>
    </div>
</x-app-layout>