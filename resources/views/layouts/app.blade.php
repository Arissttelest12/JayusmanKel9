<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jayusman Market - @yield('title')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/preline@latest/dist/preline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    
    <!-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> -->
</head>
<body class="bg-slate-50 dark:bg-slate-900 font-sans antialiased text-slate-800 dark:text-slate-200 transition-colors duration-300">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            @include('components.header')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-slate-50 dark:bg-slate-900 transition-colors duration-300">
                @if (isset($header))
                    <div class="mb-6">
                        {{ $header }}
                    </div>
                @endif
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>
</body>
</html> 