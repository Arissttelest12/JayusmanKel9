<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\StokKeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditTrailController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\StokBarang;
use App\Models\Cabang;
use App\Models\User;

Route::get('/dashboard', function () {
    if (auth()->user() && auth()->user()->hasRole(['gudang', 'Gudang'])) {
        return redirect()->route('items.index');
    }

    $year = now()->year;

    // Base query for transactions per month
    $transQuery = Transaksi::selectRaw('MONTH(tanggal_transaksi) as m, SUM(total_harga) as total')
        ->whereYear('tanggal_transaksi', $year);

    if (auth()->user() && auth()->user()->hasRole(['manager','Manager'])) {
        $transQuery->where('id_cabang', auth()->user()->id_cabang);
    }

    $monthly = $transQuery->groupBy('m')->pluck('total','m')->toArray();

    $monthlyData = [];
    for ($i=1;$i<=12;$i++) {
        $monthlyData[] = isset($monthly[$i]) ? (int)$monthly[$i] : 0;
    }

    // Summary cards
    $totalCabang = Cabang::count();
    $totalUsers = User::count();

    $stokTotalItems = StokBarang::sum('jumlah_stok');

    $totalTransaksiThisMonth = Transaksi::whereYear('tanggal_transaksi', $year)
        ->whereMonth('tanggal_transaksi', now()->month)
        ->when(auth()->user() && auth()->user()->hasRole(['manager','Manager']), function ($q) {
            $q->where('id_cabang', auth()->user()->id_cabang);
        })->count();

    return view('dashboard', compact('monthlyData','totalCabang','totalUsers','stokTotalItems','totalTransaksiThisMonth'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Branches Routes
    Route::resource('branches', CabangController::class)->parameters(['branches' => 'cabang']);

    // Categories Routes
    Route::resource('categories', KategoriBarangController::class)->parameters(['categories' => 'kategoriBarang']);

    // Items Routes
    Route::resource('items', BarangController::class)
        ->parameters(['items' => 'barang'])
        ->middleware('role:owner|gudang|Owner|Gudang');

    // Stock Routes
    Route::resource('stocks', StokBarangController::class)->parameters(['stocks' => 'stokBarang']);

    // Transactions Routes
    Route::get('transactions/barang-cabang/{id_cabang}', [TransaksiController::class, 'getBarangByCabang'])->name('transactions.barang_cabang');
    Route::resource('transactions', TransaksiController::class)->parameters(['transactions' => 'transaksi']);

    // Stock In Routes
    Route::resource('stock-in', StokMasukController::class)->parameters(['stock-in' => 'stokMasuk']);

    // Stock Out Routes
    Route::resource('stock-out', StokKeluarController::class)->parameters(['stock-out' => 'stokKeluar']);

    // Users Routes
    Route::resource('users', UserController::class)->middleware('permission:manage_users');

    // Audit Trails
    Route::get('audit-trails', [AuditTrailController::class, 'index'])->name('audit-trails.index');

    // Reports Routes
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/view/{type}', [App\Http\Controllers\ReportController::class, 'view'])->name('reports.view');
    Route::get('/reports/export/pdf/{type}', [App\Http\Controllers\ReportController::class, 'exportPdf'])->name('reports.export.pdf');
    Route::get('/reports/export/excel/{type}', [App\Http\Controllers\ReportController::class, 'exportExcel'])->name('reports.export.excel');
});

require __DIR__.'/auth.php';
