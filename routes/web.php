<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/branches', function () {
        return view('branches.index');
    })->name('branches.index');

    Route::get('/transactions', function () {
        return view('transactions.index');
    })->name('transactions.index');

    Route::get('/stocks', function () {
        return view('stocks.index');
    })->name('stocks.index');

    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');
});

require __DIR__.'/auth.php';
