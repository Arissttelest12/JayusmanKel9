<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-slate-800">Edit User: {{ $user->name }}</h2>
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

        @if(session('error'))
        <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 rounded-xl mb-6">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" 
                           class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Role</label>
                    <select name="role" id="role_selector" required 
                            class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                        @php $userRole = $user->roles->first() ? $user->roles->first()->name : ''; @endphp
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ old('role', $userRole) == $role->name ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cabang (Tergantung Role dan Akses) -->
                <div id="cabang_container">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Cabang (Opsional jika Owner)</label>
                    @if(Auth::user()->hasRole(['Owner', 'owner']))
                        <select name="id_cabang" id="id_cabang" 
                                class="w-full rounded-xl border-slate-300 focus:border-[#00ADB5] focus:ring-[#00ADB5]">
                            <option value="">-- Pilih Cabang --</option>
                            @foreach($cabangs as $cabang)
                                <option value="{{ $cabang->id_cabang }}" {{ old('id_cabang', $user->id_cabang) == $cabang->id_cabang ? 'selected' : '' }}>
                                    {{ $cabang->nama_cabang }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <!-- Manajer hanya bisa assign ke cabangnya sendiri -->
                        <input type="hidden" name="id_cabang" value="{{ Auth::user()->id_cabang }}">
                        <input type="text" value="{{ $cabangs->first()->nama_cabang }}" disabled 
                               class="w-full rounded-xl border-slate-300 bg-slate-100 text-slate-500 cursor-not-allowed">
                    @endif
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-slate-100">
                <a href="{{ route('users.index') }}" class="px-6 py-2.5 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#00ADB5] text-white font-semibold hover:bg-[#00838F] shadow-lg shadow-[#00ADB5]/30 transition-all">
                    Update User
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelector = document.getElementById('role_selector');
            const cabangSelector = document.getElementById('id_cabang');
            
            if(roleSelector && cabangSelector) {
                roleSelector.addEventListener('change', function() {
                    if (this.value === 'owner') {
                        cabangSelector.removeAttribute('required');
                    } else {
                        cabangSelector.setAttribute('required', 'required');
                    }
                });
                roleSelector.dispatchEvent(new Event('change'));
            }
        });
    </script>
</x-app-layout>
