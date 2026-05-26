<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Daftar Transaksi</h2>
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-[#00ADB5] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:bg-[#00838F] active:scale-95 transition-all ease-out duration-300 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Transaksi
            </a>
        </div>
    </x-slot>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 transition-colors duration-300">
        @if(session('success'))
        <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-400 px-4 py-3 rounded-xl mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-xl">ID</th>
                        <th class="px-6 py-4 text-left font-semibold">Cabang</th>
                        <th class="px-6 py-4 text-left font-semibold">Kasir</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-right font-semibold">Total Harga</th>
                        <th class="px-6 py-4 text-left font-semibold">Metode Pembayaran</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-slate-700 dark:text-slate-300">
                    @forelse($transaksis as $transaksi)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                        <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4 font-medium">{{ $transaksi->cabang->nama_cabang }}</td>
                        <td class="px-6 py-4">{{ $transaksi->kasir->name }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tanggal_transaksi->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right font-semibold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $transaksi->metode_pembayaran == 'Cash' ? 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400' : 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400' }}">
                                {{ $transaksi->metode_pembayaran }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('transactions.show', $transaksi->id_transaksi) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg text-sm hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors">
                                Lihat
                            </a>
                            <a href="{{ route('transactions.edit', $transaksi->id_transaksi) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-lg text-sm hover:bg-amber-200 dark:hover:bg-amber-900/50 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaksi->id_transaksi) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 rounded-lg text-sm hover:bg-rose-200 dark:hover:bg-rose-900/50 transition-colors" onclick="return confirm('Hapus transaksi ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400 bg-slate-50/50 dark:bg-slate-800/50 rounded-b-xl">Tidak ada data transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $transaksis->links() }}
        </div>
    </div>
</x-app-layout>