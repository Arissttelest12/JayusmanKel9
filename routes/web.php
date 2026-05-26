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
    Route::resource('branches', CabangController::class);

    // Categories Routes
    Route::resource('categories', KategoriBarangController::class);

    // Items Routes
    Route::resource('items', BarangController::class);

    // Stock Routes
    Route::resource('stocks', StokBarangController::class);

    // Transactions Routes
    Route::resource('transactions', TransaksiController::class);

    // Stock In Routes
    Route::resource('stock-in', StokMasukController::class);

    // Stock Out Routes
    Route::resource('stock-out', StokKeluarController::class);

    // Users Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Reports Routes
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');
});

require __DIR__.'/auth.php';
