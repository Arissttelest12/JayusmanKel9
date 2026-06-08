<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Barang Baru</h2>
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

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                    <select name="id_kategori" required 
                            class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Kode Barang -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kode Barang</label>
                    <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Nama Barang -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Harga Beli -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Beli</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-slate-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="harga_beli" step="0.01" value="{{ old('harga_beli') }}" required 
                               class="w-full pl-10 rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                    </div>
                </div>

                <!-- Harga Jual -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga Jual</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-slate-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="harga_jual" step="0.01" value="{{ old('harga_jual') }}" required 
                               class="w-full pl-10 rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                    </div>
                </div>

                <!-- Satuan -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Satuan (Contoh: pcs, kg)</label>
                    <input type="text" name="satuan" value="{{ old('satuan') }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>
            </div>

            <div class="border-t border-slate-100 pt-6 mb-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Informasi Stok Awal (Opsional)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cabang -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Cabang</label>
                        <select name="id_cabang" 
                                class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                            <option value="">-- Pilih Cabang --</option>
                            @foreach($cabangs as $cabang)
                            <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang', auth()->user()->id_cabang) == $cabang->id_cabang ? 'selected' : '' }}>
                                {{ $cabang->nama_cabang }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jumlah Stok -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jumlah Stok Masuk</label>
                        <input type="number" name="jumlah_stok" value="{{ old('jumlah_stok', 0) }}" min="0" 
                               class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        <p class="text-xs text-slate-500 mt-2">Biarkan 0 jika belum ada stok masuk.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('items.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#00ADB5] text-white font-semibold hover:bg-[#00838F] shadow-lg shadow-[#00ADB5]/30 transition-all">
                    Simpan Barang
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
