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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
    Route::resource('items', BarangController::class)->parameters(['items' => 'barang']);

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
    Route::resource('users', UserController::class);

    // Reports Routes
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');
});

require __DIR__.'/auth.php';
