<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Cabang</h2>
    </x-slot>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 max-w-3xl mx-auto">
        
        @if ($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('branches.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Nama Cabang -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Cabang</label>
                    <input type="text" name="nama_cabang" value="{{ old('nama_cabang') }}" required autofocus 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Kota -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kota</label>
                    <input type="text" name="kota" value="{{ old('kota') }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" rows="4" required 
                              class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">{{ old('alamat') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('branches.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#00ADB5] text-white font-semibold hover:bg-[#00838F] shadow-lg shadow-[#00ADB5]/30 transition-all">
                    Simpan Cabang
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
