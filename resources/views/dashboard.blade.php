@extends('layouts.app')

@section('title', 'Dashboard')
@section('header-title', 'Dashboard')

@section('content')
<style>
    /* Premium Entry Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
    .delay-500 { animation-delay: 500ms; }
    .delay-600 { animation-delay: 600ms; }
    .delay-700 { animation-delay: 700ms; }

    /* Custom Premium Card Transitions */
    .premium-card {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(0, 0, 0, 0.04);
        position: relative;
        background: #ffffff;
    }

    .premium-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #00ADB5 0%, #00838F 100%);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .premium-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 30px -10px rgba(0, 173, 181, 0.12), 0 10px 15px -5px rgba(0, 0, 0, 0.03);
        border-color: rgba(0, 173, 181, 0.2);
    }

    .premium-card:hover::after {
        transform: scaleX(1);
    }

    .premium-card .icon-container {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .premium-card:hover .icon-container {
        background-color: rgba(0, 173, 181, 0.15);
        transform: scale(1.1) rotate(6deg);
    }

    .premium-card .icon-svg {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .premium-card:hover .icon-svg {
        color: #00838F;
    }

    /* Soft Glow Text */
    .glow-text {
        text-shadow: 0 0 16px rgba(0, 173, 181, 0.2);
    }

    /* Smooth Hover for Lists */
    .list-item-hover {
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .list-item-hover:hover {
        background-color: rgba(0, 173, 181, 0.03);
        padding-left: 8px;
    }

    /* Premium Button Hover */
    .premium-btn {
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .premium-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px -4px rgba(0, 173, 181, 0.3);
    }

    .premium-btn:active {
        transform: translateY(0);
    }
</style>

<!-- Welcome Section -->
<div class="bg-gradient-to-br from-[#222831] via-[#2D323E] to-[#393E46] text-[#EEEEEE] rounded-2xl p-8 mb-8 relative overflow-hidden shadow-lg animate-fade-in-up">
    <!-- Elegant background minimal rotating lines -->
    <div class="absolute right-0 bottom-0 opacity-10 pointer-events-none transform translate-x-12 translate-y-12">
        <svg class="w-64 h-64 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation: spin 80s linear infinite;">
            <circle cx="12" cy="12" r="10" stroke-width="0.5" stroke-dasharray="4 4" />
            <circle cx="12" cy="12" r="8" stroke-width="0.3" stroke-dasharray="2 2" />
        </svg>
    </div>
    
    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold tracking-tight mb-2 flex items-center gap-2">
                <span>Selamat Datang kembali, {{ Auth::user() ? Auth::user()->name : 'Admin' }}!</span>
                <span class="animate-bounce inline-block" style="animation-duration: 2s;">👋</span>
            </h2>
            <p class="text-gray-300 max-w-xl leading-relaxed">
                Anda masuk sebagai <span class="text-[#00ADB5] font-semibold">{{ Auth::user() && Auth::user()->roles->isNotEmpty() ? ucfirst(Auth::user()->roles->first()->name) : 'Owner' }}</span>. Kelola dan pantau seluruh performa cabang, stok barang, dan transaksi harian Jayusman Market dengan mudah dari dashboard ini.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 bg-white/10 backdrop-blur-md border border-white/10 rounded-xl text-center">
                <p class="text-xs text-gray-400">Total Cabang</p>
                <p class="text-lg font-bold text-[#00ADB5]">3 Aktif</p>
            </div>
            <div class="px-4 py-2 bg-white/10 backdrop-blur-md border border-white/10 rounded-xl text-center">
                <p class="text-xs text-gray-400">Status Sistem</p>
                <p class="text-lg font-bold text-green-400 flex items-center gap-1.5 justify-center">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> Optimal
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Card Total Cabang -->
    <div class="premium-card rounded-xl shadow-sm overflow-hidden cursor-pointer animate-fade-in-up delay-100">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-[#393E46]/60 font-semibold uppercase tracking-wider">Total Cabang</p>
                    <p class="text-4xl font-extrabold text-[#222831] mt-2 glow-text" id="counter-cabang" data-target="3">0</p>
                </div>
                <div class="bg-[#00ADB5]/5 p-3 rounded-xl icon-container">
                    <svg class="w-6 h-6 text-[#00ADB5] icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Transaksi -->
    <div class="premium-card rounded-xl shadow-sm overflow-hidden cursor-pointer animate-fade-in-up delay-200">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-[#393E46]/60 font-semibold uppercase tracking-wider">Total Transaksi</p>
                    <p class="text-4xl font-extrabold text-[#222831] mt-2 glow-text" id="counter-transaksi" data-target="125">0</p>
                </div>
                <div class="bg-[#00ADB5]/5 p-3 rounded-xl icon-container">
                    <svg class="w-6 h-6 text-[#00ADB5] icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Stok -->
    <div class="premium-card rounded-xl shadow-sm overflow-hidden cursor-pointer animate-fade-in-up delay-300">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-[#393E46]/60 font-semibold uppercase tracking-wider">Total Stok</p>
                    <p class="text-4xl font-extrabold text-[#222831] mt-2 glow-text" id="counter-stok" data-target="342">0</p>
                </div>
                <div class="bg-[#00ADB5]/5 p-3 rounded-xl icon-container">
                    <svg class="w-6 h-6 text-[#00ADB5] icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total User -->
    <div class="premium-card rounded-xl shadow-sm overflow-hidden cursor-pointer animate-fade-in-up delay-400">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs text-[#393E46]/60 font-semibold uppercase tracking-wider">Total User</p>
                    <p class="text-4xl font-extrabold text-[#222831] mt-2 glow-text" id="counter-user" data-target="8">0</p>
                </div>
                <div class="bg-[#00ADB5]/5 p-3 rounded-xl icon-container">
                    <svg class="w-6 h-6 text-[#00ADB5] icon-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8 animate-fade-in-up delay-500">
    <div class="flex justify-between items-center mb-6 pb-2 border-b border-gray-100">
        <h2 class="text-lg font-bold text-[#222831] flex items-center gap-2">
            <span class="w-1.5 h-5 bg-[#00ADB5] rounded-full"></span>
            <span>Grafik Penjualan Bulanan</span>
        </h2>
        <span class="text-xs text-[#393E46]/60 font-semibold uppercase tracking-wider bg-gray-100 px-3 py-1 rounded-full">Tahun Ini</span>
    </div>
    <div class="relative w-full h-[320px]">
        <canvas id="salesChart"></canvas>
    </div>
</div>

<!-- Card Laporan -->
<div class="mt-8 animate-fade-in-up delay-600">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-[#222831] flex items-center gap-2">
            <span class="w-1.5 h-5 bg-[#00ADB5] rounded-full"></span>
            <span>Ringkasan Laporan</span>
        </h2>
        <a href="{{ route('reports.index') }}" class="text-sm text-[#00ADB5] hover:text-[#00838F] font-semibold flex items-center gap-1 group transition-all duration-200">
            <span>Lihat Semua</span>
            <span class="transform group-hover:translate-x-1 transition-transform">→</span>
        </a>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Card Ringkasan Transaksi -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-[#00ADB5]/5 to-transparent">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-[#00ADB5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <h3 class="font-bold text-[#222831]">Laporan Penjualan</h3>
                </div>
            </div>
            <div class="p-5 space-y-1">
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46]">Total Transaksi Bulan Ini</span>
                    <span class="font-bold text-[#222831]">125</span>
                </div>
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46]">Pendapatan Bulan Ini</span>
                    <span class="font-bold text-green-600">Rp 45.000.000</span>
                </div>
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46]">Rata-rata per Hari</span>
                    <span class="font-bold text-[#222831]">4 transaksi</span>
                </div>
                <div class="flex justify-between items-center pt-3 px-2">
                    <span class="text-[#393E46] font-medium">Total Keseluruhan</span>
                    <span class="font-extrabold text-xl text-[#00ADB5] glow-text">Rp 450.000.000</span>
                </div>
            </div>
        </div>

        <!-- Card Ringkasan Stok -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-[#00ADB5]/5 to-transparent">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-[#00ADB5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <h3 class="font-bold text-[#222831]">Laporan Stok</h3>
                </div>
            </div>
            <div class="p-5 space-y-1">
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46]">Total Item Stok</span>
                    <span class="font-bold text-[#222831]">342</span>
                </div>
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46]">Nilai Total Stok</span>
                    <span class="font-bold text-[#222831]">Rp 125.000.000</span>
                </div>
                <div class="flex justify-between items-center py-2.5 border-b border-gray-100 list-item-hover px-2 rounded-lg">
                    <span class="text-[#393E46] text-red-500 font-semibold flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-ping"></span>
                        <span>Stok Menipis</span>
                    </span>
                    <span class="font-bold text-red-500">3 item</span>
                </div>
                <div class="flex justify-between items-center pt-3 px-2">
                    <span class="text-[#393E46] font-medium">Stok Akan Kadaluarsa</span>
                    <span class="font-bold text-orange-500">2 item</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Export -->
    <div class="bg-gradient-to-r from-[#00ADB5]/5 to-[#00838F]/5 border border-[#00ADB5]/10 rounded-2xl p-5 mt-6 flex flex-col sm:flex-row items-center justify-between gap-4 animate-fade-in-up delay-700">
        <div class="flex items-center space-x-3">
            <div class="bg-[#00ADB5] p-2.5 rounded-xl text-white shadow-md shadow-[#00ADB5]/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-[#222831]">Unduh Laporan Berkala</p>
                <p class="text-xs text-[#393E46]/70">Export laporan ke format PDF atau Excel untuk keperluan analisis data.</p>
            </div>
        </div>
        <div class="flex space-x-3 w-full sm:w-auto">
            <button id="exportPdfBtn" class="premium-btn w-full sm:w-auto px-5 py-2.5 bg-white border border-[#00ADB5]/30 text-[#00ADB5] rounded-xl text-sm font-semibold hover:border-[#00ADB5] flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Export PDF</span>
            </button>
            <button id="exportExcelBtn" class="premium-btn w-full sm:w-auto px-5 py-2.5 bg-[#00ADB5] text-white rounded-xl text-sm font-semibold hover:bg-[#00838F] flex items-center justify-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Export Excel</span>
            </button>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div id="exportModal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="exportModal-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="bg-white border border-gray-100 rounded-2xl shadow-xl p-6">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4 animate-bounce">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 id="exportModal-label" class="block text-lg font-bold text-gray-800">Export Berhasil</h3>
                <div class="mt-2 text-sm text-gray-600">
                    File laporan telah berhasil diekspor dan siap untuk diunduh.
                </div>
            </div>
            <div class="mt-6 flex justify-center gap-x-3">
                <button type="button" class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#exportModal">
                    Tutup
                </button>
                <button type="button" class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-xl bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Unduh File
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Preline
    HSStaticMethods.autoInit();

    // Counting Number Animation
    function animateCounter(id, start, end, duration) {
        const obj = document.getElementById(id);
        if (!obj) return;
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const easeProgress = 1 - Math.pow(1 - progress, 3); // easeOutCubic
            obj.innerHTML = Math.floor(easeProgress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                obj.innerHTML = end;
            }
        };
        window.requestAnimationFrame(step);
    }

    // Trigger Counters with slight staggering
    setTimeout(() => animateCounter('counter-cabang', 0, @json($totalCabang ?? 0), 1000), 100);
    setTimeout(() => animateCounter('counter-transaksi', 0, @json($totalTransaksiThisMonth ?? 0), 1400), 200);
    setTimeout(() => animateCounter('counter-stok', 0, @json($stokTotalItems ?? 0), 1600), 300);
    setTimeout(() => animateCounter('counter-user', 0, @json($totalUsers ?? 0), 1200), 400);

    // Chart initialization
    const ctx = document.getElementById('salesChart').getContext('2d');
    
    // Create gradient
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(0, 173, 181, 0.4)');
    gradient.addColorStop(1, 'rgba(0, 173, 181, 0.0)');

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Penjualan',
                data: {!! json_encode($monthlyData ?? array_fill(0,12,0)) !!},
                borderColor: '#00ADB5',
                borderWidth: 3,
                pointBackgroundColor: '#00ADB5',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointHoverBorderWidth: 2,
                pointHoverBackgroundColor: '#00838F',
                tension: 0.35,
                fill: true,
                backgroundColor: gradient
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#222831',
                    titleColor: '#ffffff',
                    bodyColor: '#EEEEEE',
                    borderColor: 'rgba(0, 173, 181, 0.2)',
                    borderWidth: 1,
                    padding: 12,
                    boxPadding: 6,
                    cornerRadius: 8,
                    usePointStyle: true,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    grid: {
                        color: 'rgba(0, 0, 0, 0.04)',
                        drawBorder: false
                    },
                    ticks: {
                        color: '#393E46',
                        font: {
                            family: "'Inter', sans-serif",
                            size: 11
                        },
                        callback: function(value) {
                            return 'Rp ' + (value / 1000000) + 'jt';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#393E46',
                        font: {
                            family: "'Inter', sans-serif",
                            size: 11
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // Export button handlers
    document.getElementById('exportPdfBtn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.querySelector('span').textContent;
        
        // Show loading state
        btn.querySelector('span').textContent = 'Memproses...';
        btn.querySelector('svg').style.display = 'none';
        btn.insertAdjacentHTML('afterbegin', '<div class="animate-spin rounded-full h-4 w-4 border-b-2 border-[#00ADB5] mr-2"></div>');
        btn.disabled = true;
        
        // Simulate export process
        setTimeout(() => {
            btn.querySelector('.animate-spin').remove();
            btn.querySelector('svg').style.display = '';
            btn.querySelector('span').textContent = originalText;
            btn.disabled = false;
            
            // Show success modal
            HSOverlay.open('#exportModal');
        }, 1500);
    });

    document.getElementById('exportExcelBtn').addEventListener('click', function() {
        const btn = this;
        const originalText = btn.querySelector('span').textContent;
        
        // Show loading state
        btn.querySelector('span').textContent = 'Memproses...';
        btn.querySelector('svg').style.display = 'none';
        btn.insertAdjacentHTML('afterbegin', '<div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white mr-2"></div>');
        btn.disabled = true;
        
        // Simulate export process
        setTimeout(() => {
            btn.querySelector('.animate-spin').remove();
            btn.querySelector('svg').style.display = '';
            btn.querySelector('span').textContent = originalText;
            btn.disabled = false;
            
            // Show success modal
            HSOverlay.open('#exportModal');
        }, 1500);
    });

    // Card click handlers with subtle shrink/expand click effect
    document.querySelectorAll('.premium-card').forEach((card, index) => {
        card.addEventListener('click', function() {
            const routes = [
                '{{ route("branches.index") }}', 
                '{{ route("transactions.index") }}', 
                '{{ route("stocks.index") }}', 
                '{{ route("users.index") }}'
            ];
            
            this.style.transform = 'scale(0.97)';
            setTimeout(() => {
                this.style.transform = '';
                window.location.href = routes[index];
            }, 150);
        });
    });
});
</script>

@endsection