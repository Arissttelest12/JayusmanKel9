<x-guest-layout>
    <div class="mb-6 text-center">
        <h3 class="text-xl font-bold text-slate-800">Daftar Akun Baru</h3>
        <p class="text-sm text-slate-500 mt-1">Lengkapi data di bawah untuk membuat akun baru Anda.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </span>
                <input id="name" 
                       class="block w-full pl-11 pr-4 py-3 border border-slate-200 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-2xl shadow-sm transition-all duration-300 ease-out hover:border-slate-300 text-slate-800 bg-white" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autofocus 
                       placeholder="Nama lengkap Anda"
                       autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                </span>
                <input id="email" 
                       class="block w-full pl-11 pr-4 py-3 border border-slate-200 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-2xl shadow-sm transition-all duration-300 ease-out hover:border-slate-300 text-slate-800 bg-white" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       placeholder="nama@email.com"
                       autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <!-- Password -->
        <div x-data="{ showPassword: false }">
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Kata Sandi</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </span>
                <input id="password" 
                       class="block w-full pl-11 pr-11 py-3 border border-slate-200 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-2xl shadow-sm transition-all duration-300 ease-out hover:border-slate-300 text-slate-800 bg-white"
                       :type="showPassword ? 'text' : 'password'"
                       name="password"
                       required 
                       placeholder="Minimal 8 karakter"
                       autocomplete="new-password" />
                <button type="button" 
                        @click="showPassword = !showPassword" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 focus:outline-none">
                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="showPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        <!-- Confirm Password -->
        <div x-data="{ showConfirmPassword: false }">
            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">Konfirmasi Kata Sandi</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </span>
                <input id="password_confirmation" 
                       class="block w-full pl-11 pr-11 py-3 border border-slate-200 focus:border-[#00ADB5] focus:ring-[#00ADB5] rounded-2xl shadow-sm transition-all duration-300 ease-out hover:border-slate-300 text-slate-800 bg-white"
                       :type="showConfirmPassword ? 'text' : 'password'"
                       name="password_confirmation" 
                       required 
                       placeholder="Ulangi kata sandi"
                       autocomplete="new-password" />
                <button type="button" 
                        @click="showConfirmPassword = !showConfirmPassword" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 focus:outline-none">
                    <svg x-show="!showConfirmPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="showConfirmPassword" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center items-center px-4 py-3 bg-[#00ADB5] border border-transparent rounded-2xl font-bold text-sm text-white hover:bg-[#00838F] hover:shadow-lg hover:shadow-[#00ADB5]/20 focus:bg-[#00838F] active:bg-[#00747e] active:scale-98 focus:outline-none focus:ring-2 focus:ring-[#00ADB5] focus:ring-offset-2 transition-all ease-out duration-300 transform hover:-translate-y-0.5">
                {{ __('Daftar Sekarang') }}
            </button>
        </div>
    </form>

    <!-- Login Link -->
    <div class="mt-8 pt-6 border-t border-slate-100 text-center text-sm text-slate-500 font-medium">
        Sudah terdaftar? 
        <a href="{{ route('login') }}" class="font-bold text-[#00ADB5] hover:text-[#00838F] transition-colors duration-200">
            Masuk ke Akun
        </a>
    </div>
</x-guest-layout>

