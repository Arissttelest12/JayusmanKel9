<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-800">Daftar Transaksi</h2>
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-[#00ADB5] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:bg-[#00838F] active:scale-95 transition-all ease-out duration-300 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Transaksi
            </a>
        </div>
    </x-slot>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-xl">ID</th>
                        <th class="px-6 py-4 text-left font-semibold">Cabang</th>
                        <th class="px-6 py-4 text-left font-semibold">Kasir</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-right font-semibold">Total Harga</th>
                        <th class="px-6 py-4 text-left font-semibold">Metode Pembayaran</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($transaksis as $transaksi)
                    <tr class="hover:bg-slate-50 transition-colors duration-200">
                        <td class="px-6 py-4">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4 font-medium">{{ $transaksi->cabang->nama_cabang }}</td>
                        <td class="px-6 py-4">{{ $transaksi->kasir->name }}</td>
                        <td class="px-6 py-4">{{ $transaksi->tanggal_transaksi->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 text-right font-semibold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $transaksi->metode_pembayaran == 'Cash' ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $transaksi->metode_pembayaran }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('transactions.show', $transaksi->id_transaksi) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-sm hover:bg-blue-100 transition-colors">
                                Lihat
                            </a>
                            <a href="{{ route('transactions.edit', $transaksi->id_transaksi) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg text-sm hover:bg-amber-200 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaksi->id_transaksi) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-rose-100 text-rose-700 rounded-lg text-sm hover:bg-rose-200 transition-colors" onclick="return confirm('Hapus transaksi ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-slate-500 bg-slate-50/50 rounded-b-xl">Tidak ada data transaksi.</td>
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