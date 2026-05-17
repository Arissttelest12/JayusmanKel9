<header class="bg-[#EEEEEE] shadow-sm p-4 flex justify-between items-center border-b-2 border-[#00ADB5]">
    <div class="text-lg font-semibold text-[#222831]">
        @yield('header-title', 'Dashboard')
    </div>
    <div class="flex items-center space-x-4">
        <span class="text-[#393E46] font-medium">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user() ? Auth::user()->name : 'Guest') }}&background=00ADB5&color=fff&bold=true" 
             class="w-9 h-9 rounded-full ring-2 ring-[#00ADB5]">
    </div>
</header>