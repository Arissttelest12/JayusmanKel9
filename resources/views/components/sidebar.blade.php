<style>
    /* Premium Sidebar Styling & Easing */
    .sidebar-bg {
        background: linear-gradient(180deg, #1E232B 0%, #12161C 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.05);
    }

    .logo-container-glow {
        border: 1px solid rgba(0, 173, 181, 0.15);
        box-shadow: 0 0 16px rgba(0, 173, 181, 0.06);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .logo-container-glow:hover {
        border-color: rgba(0, 173, 181, 0.4);
        box-shadow: 0 0 24px rgba(0, 173, 181, 0.18);
        transform: scale(1.03);
    }

    .sidebar-nav-link {
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        color: rgba(238, 238, 238, 0.6);
        border-left: 3px solid transparent;
        position: relative;
    }

    .sidebar-nav-link:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.04);
        padding-left: 16px;
    }

    .sidebar-nav-link.active {
        color: #ffffff;
        background: linear-gradient(90deg, rgba(0, 173, 181, 0.15) 0%, rgba(0, 173, 181, 0.01) 100%);
        border-left-color: #00ADB5;
        font-weight: 600;
    }

    .sidebar-nav-link .nav-icon {
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        color: rgba(238, 238, 238, 0.4);
    }

    .sidebar-nav-link:hover .nav-icon {
        color: #00ADB5;
        transform: scale(1.1) translateX(2px);
    }

    .sidebar-nav-link.active .nav-icon {
        color: #00ADB5;
    }

    /* Subtle pulsing active state indicator */
    .active-dot {
        box-shadow: 0 0 8px #00ADB5;
    }

    .profile-card {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.04);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .profile-card:hover {
        background: rgba(255, 255, 255, 0.04);
        border-color: rgba(0, 173, 181, 0.15);
    }

    .logout-btn {
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(239, 68, 68, 0.2);
        background: transparent;
        color: #ef4444;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.08);
        border-color: #ef4444;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
    }
</style>

<aside class="w-64 sidebar-bg text-[#EEEEEE] flex flex-col shadow-2xl rounded-tr-3xl overflow-hidden h-screen">
    <!-- Logo Section -->
    <div class="p-6 border-b border-white/5">
        <div class="flex items-center space-x-3">
            <!-- Icon with Glow -->
            <div class="w-10 h-10 bg-[#00ADB5] rounded-xl flex items-center justify-center shadow-lg logo-container-glow">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13l1.5 6M9 21h6M12 15v6"></path>
                </svg>
            </div>
            <!-- Text -->
            <div class="leading-tight">
                <h1 class="text-[15px] font-bold tracking-wider text-white">Jayusman Market</h1>
                <p class="text-[11px] text-[#00ADB5] uppercase tracking-widest font-semibold opacity-90">Management</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu-->
    <nav class="flex-1 px-3 py-6 space-y-7 overflow-y-auto">
        <!-- Group: UTAMA -->
        @if(Auth::user()->hasRole(['Owner', 'owner', 'Manajer', 'manajer', 'Supervisor', 'supervisor', 'Gudang', 'gudang']))
        <div>
            <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-[#EEEEEE]/30 mb-2">Utama</p>
            <div class="space-y-1">
                <!-- Menu Dashboard -->
                <a href="{{ route('dashboard') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
            </div>
        </div>
        @endif

        <!-- Group: OPERASIONAL -->
        <div>
            <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-[#EEEEEE]/30 mb-2">Operasional</p>
            <div class="space-y-1">
                <!-- Menu Transaksi -->
                @canany(['view_transactions', 'create_transactions'])
                <a href="{{ route('transactions.index') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('transactions.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <span class="text-sm font-medium">Transaksi</span>
                    @if(request()->routeIs('transactions.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
                @endcanany

                <!-- Menu Stok -->
                @can('manage_stocks')
                <a href="{{ route('stocks.index') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('stocks.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="text-sm font-medium">Stok Barang</span>
                    @if(request()->routeIs('stocks.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
                @endcan
            </div>
        </div>

        <!-- Group: DATA & LAPORAN -->
        @canany(['manage_branches', 'view_reports'])
        <div>
            <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-[#EEEEEE]/30 mb-2">Data & Laporan</p>
            <div class="space-y-1">
                <!-- Menu Cabang Toko -->
                @can('manage_branches')
                <a href="{{ route('branches.index') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('branches.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="text-sm font-medium">Cabang Toko</span>
                    @if(request()->routeIs('branches.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
                @endcan

                <!-- Menu Laporan -->
                @can('view_reports')
                <a href="{{ route('reports.index') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v4m0 0l-2-2m2 2l2-2" />
                    </svg>
                    <span class="text-sm font-medium">Laporan</span>
                    @if(request()->routeIs('reports.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
                @endcan
            </div>
        </div>
        @endcanany

        <!-- Group: PENGATURAN -->
        @can('manage_users')
        <div>
            <p class="px-3 text-[10px] font-bold uppercase tracking-widest text-[#EEEEEE]/30 mb-2">Pengaturan</p>
            <div class="space-y-1">
                <!-- Menu User -->
                <a href="{{ route('users.index') }}" class="group sidebar-nav-link flex items-center space-x-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <span class="text-sm font-medium">User Management</span>
                    @if(request()->routeIs('users.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-[#00ADB5] rounded-full active-dot animate-pulse"></span>
                    @endif
                </a>
            </div>
        </div>
        @endcan
    </nav>

    <!-- Profile Section at Bottom -->
    <div class="p-4 border-t border-white/5 bg-black/10">
        <div class="flex flex-col space-y-4">
            <!-- User Info Card -->
            <div class="profile-card p-3 rounded-xl flex items-center space-x-3">
                <!-- Initials Avatar -->
                <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-[#00ADB5] to-[#00838F] flex items-center justify-center font-bold text-sm text-white shadow-md">
                    {{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'A' }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate" title="{{ Auth::user() ? Auth::user()->name : 'Admin' }}">
                        {{ Auth::user() ? Auth::user()->name : 'Admin' }}
                    </p>
                    <span class="text-[10px] bg-[#00ADB5]/15 text-[#00ADB5] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider mt-1 inline-block">
                        {{ Auth::user() && Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : 'Owner' }}
                    </span>
                </div>
            </div>
            
            @auth
                <!-- Form Logout Breeze -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="logout-btn w-full flex items-center justify-center space-x-2 px-3 py-2.5 rounded-xl text-xs font-bold transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Keluar Sistem</span>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</aside>