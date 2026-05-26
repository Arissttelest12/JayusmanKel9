<header class="bg-white dark:bg-slate-800 shadow-sm p-4 flex justify-between items-center border-b border-slate-200 dark:border-slate-700 transition-colors duration-300">
    <div class="text-lg font-bold text-slate-800 dark:text-slate-100">
        @yield('header-title', 'Dashboard')
    </div>
    <div class="flex items-center space-x-4">
        <!-- Theme Toggle Button -->
        <button id="theme-toggle" class="p-2 rounded-xl text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-slate-700 transition-colors focus:outline-none focus:ring-2 focus:ring-[#00ADB5]">
            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 4.22a1 1 0 011.415 1.415l-.708.708a1 1 0 01-1.414-1.414l.707-.707zm-9.855 0a1 1 0 011.414 0l.707.707a1 1 0 01-1.414 1.414l-.707-.707a1 1 0 010-1.414zM4 10a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm14 0a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM7 10a3 3 0 116 0 3 3 0 01-6 0zm-2.78 4.22a1 1 0 011.414 0l.707-.707a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414zm11.56 0a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z"></path></svg>
        </button>

        <span class="text-slate-600 dark:text-slate-300 font-medium">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user() ? Auth::user()->name : 'Guest') }}&background=00ADB5&color=fff&bold=true" 
             class="w-9 h-9 rounded-full ring-2 ring-[#00ADB5] ring-offset-2 dark:ring-offset-slate-800">
    </div>
</header>

<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('theme')) {
            if (localStorage.getItem('theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    });
</script>