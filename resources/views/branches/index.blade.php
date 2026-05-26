    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Daftar Cabang</h2>
            <a href="{{ route('branches.create') }}" class="inline-flex items-center px-4 py-2 bg-[#00ADB5] border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/30 focus:bg-[#00838F] active:scale-95 transition-all ease-out duration-300 transform hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Cabang
            </a>
        </div>
    </x-slot>

    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 transition-colors duration-300">
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-700/50 border-b border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm uppercase tracking-wider">
                        <th class="px-6 py-4 text-left font-semibold rounded-tl-xl">ID</th>
                        <th class="px-6 py-4 text-left font-semibold">Nama Cabang</th>
                        <th class="px-6 py-4 text-left font-semibold">Kota</th>
                        <th class="px-6 py-4 text-left font-semibold">Alamat</th>
                        <th class="px-6 py-4 text-center font-semibold rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-slate-700 dark:text-slate-300">
                    @forelse($cabangs as $cabang)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                        <td class="px-6 py-4">{{ $cabang->id_cabang }}</td>
                        <td class="px-6 py-4 font-medium">{{ $cabang->nama_cabang }}</td>
                        <td class="px-6 py-4">{{ $cabang->kota }}</td>
                        <td class="px-6 py-4">{{ $cabang->alamat }}</td>
                        <td class="px-6 py-4 flex justify-center space-x-2">
                            <a href="{{ route('branches.edit', $cabang->id_cabang) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-400 rounded-lg text-sm hover:bg-amber-200 dark:hover:bg-amber-900/50 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('branches.destroy', $cabang->id_cabang) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-rose-100 dark:bg-rose-900/30 text-rose-700 dark:text-rose-400 rounded-lg text-sm hover:bg-rose-200 dark:hover:bg-rose-900/50 transition-colors" onclick="return confirm('Hapus cabang ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400 bg-slate-50/50 dark:bg-slate-800/50 rounded-b-xl">Tidak ada data cabang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>