<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template.auth.login');
});

Route::get('/dashboard', function () {
    return view('template.dashboard.barang');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/transaksi', function () {
    return view('template.dashboard.transaksi');
})->middleware(['auth', 'verified'])->name('transaksi');

Route::get('/akses', function () {
    return view('template.dashboard.akses');
})->middleware(['auth', 'verified'])->name('akses');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('index');
    Route::get('/create', [BarangController::class, 'create'])->name('create');
    Route::post('/', [BarangController::class, 'store'])->name('store');
    Route::get('/{barang}/edit', [BarangController::class, 'edit'])->name('edit');
    Route::put('/{barang}', [BarangController::class, 'update'])->name('update');
    Route::delete('/{barang}', [BarangController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/transaksi/harga/{id}', [TransaksiController::class, 'getHarga'])->name('transaksi.getHarga');
});

require __DIR__.'/auth.php';
