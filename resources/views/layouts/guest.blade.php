<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="text-slate-900 antialiased bg-slate-50 min-h-screen relative overflow-x-hidden flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Background decorative blobs -->
        <div class="absolute top-0 -left-4 w-96 h-96 bg-[#00ADB5] rounded-full mix-blend-multiply filter blur-3xl opacity-15 animate-blob"></div>
        <div class="absolute top-10 right-10 w-96 h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-sky-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        <div class="absolute -bottom-8 right-20 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-6000"></div>

        <div class="relative w-full max-w-md z-10">
            <!-- Brand Logo / Header -->
            <div class="flex flex-col items-center mb-8">
                <a href="/" class="group transition-transform duration-300 hover:scale-105">
                    <div class="p-3.5 bg-gradient-to-tr from-[#00ADB5] to-[#00838F] rounded-2xl shadow-lg shadow-[#00ADB5]/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </a>
                <h2 class="mt-4 text-2xl font-bold tracking-tight text-slate-800">
                    {{ config('app.name', 'Jayusman') }}
                </h2>
                <p class="mt-1 text-sm text-slate-500 font-medium">
                    Sistem Informasi Manajemen Barang & Stok
                </p>
            </div>

            <!-- Main Card -->
            <div class="backdrop-blur-md bg-white/90 border border-slate-100/80 shadow-2xl rounded-3xl p-8 sm:p-10 transition-all duration-300 hover:shadow-[#00ADB5]/10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

