<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Stok Masuk</h2>
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

        <form action="{{ route('stock-in.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Cabang -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cabang</label>
                    <select name="id_cabang" required 
                            class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        <option value="">-- Pilih Cabang --</option>
                        @foreach($cabangs as $cabang)
                        <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang', auth()->user()->id_cabang) == $cabang->id_cabang ? 'selected' : '' }}>
                            {{ $cabang->nama_cabang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Barang -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Barang</label>
                    <select name="id_barang" required 
                            class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                        <option value="{{ $barang->id_barang }}" {{ old('id_barang') == $barang->id_barang ? 'selected' : '' }}>
                            {{ $barang->nama_barang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- User/Penanggung Jawab -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Penanggung Jawab</label>
                    <select name="id_user" required 
                            class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('id_user', auth()->user()->id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Masuk -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Jumlah -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jumlah</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah') }}" required min="1" 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Keterangan</label>
                    <textarea name="keterangan" rows="3" 
                              class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">{{ old('keterangan') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('stock-in.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#00ADB5] text-white font-semibold hover:bg-[#00838F] shadow-lg shadow-[#00ADB5]/30 transition-all">
                    Simpan Stok Masuk
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
