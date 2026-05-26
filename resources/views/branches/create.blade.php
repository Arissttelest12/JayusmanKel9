<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Cabang</h2>
    </x-slot>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 max-w-2xl">
        @if ($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 rounded-xl mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('branches.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <x-input-label for="nama_cabang" value="Nama Cabang" />
                <x-text-input id="nama_cabang" name="nama_cabang" type="text" class="block w-full" value="{{ old('nama_cabang') }}" required autofocus />
            </div>

            <div>
                <x-input-label for="kota" value="Kota" />
                <x-text-input id="kota" name="kota" type="text" class="block w-full" value="{{ old('kota') }}" required />
            </div>

            <div>
                <x-input-label for="alamat" value="Alamat" />
                <textarea id="alamat" name="alamat" rows="4" class="block w-full border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-xl shadow-sm transition-all duration-300 ease-out hover:border-slate-400" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <x-primary-button>Simpan</x-primary-button>
                <a href="{{ route('branches.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-100 border border-slate-200 rounded-xl font-semibold text-xs text-slate-700 uppercase tracking-widest shadow-sm hover:bg-slate-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 transition-all ease-out duration-300 transform hover:-translate-y-0.5 active:scale-95">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
