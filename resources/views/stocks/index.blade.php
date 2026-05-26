<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Daftar Stok Barang</h2>
            <a href="{{ route('stocks.create') }}" class="inline-flex items-center px-4 py-2 bg-[#00ADB5] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:bg-[#00838F] active:scale-95 transition-all ease-out duration-300 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Stok
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
                        <th class="px-6 py-4 text-left font-semibold">Barang</th>
                        <th class="px-6 py-4 text-right font-semibold">Jumlah Stok</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-slate-700 dark:text-slate-300">
                    @forelse($stoks as $stok)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                        <td class="px-6 py-4">{{ $stok->id_stok }}</td>
                        <td class="px-6 py-4 font-medium">{{ $stok->cabang->nama_cabang }}</td>
                        <td class="px-6 py-4">{{ $stok->barang->nama_barang }}</td>
                        <td class="px-6 py-4 text-right font-semibold">{{ $stok->jumlah_stok }}</td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('stocks.edit', $stok->id_stok) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-lg text-sm hover:bg-amber-200 dark:hover:bg-amber-900/50 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('stocks.destroy', $stok->id_stok) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 rounded-lg text-sm hover:bg-rose-200 dark:hover:bg-rose-900/50 transition-colors" onclick="return confirm('Hapus stok ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400 bg-slate-50/50 dark:bg-slate-800/50 rounded-b-xl">Tidak ada data stok.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $stoks->links() }}
        </div>
    </div>
</x-app-layout>