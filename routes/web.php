<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template.auth.login');
});
Route::get('/transaksi/getHarga/{id}', [TransaksiController::class, 'getHarga']);

Route::get('/dashboard', function () {
    return view('template.dashboard.barang');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/transaksi', function () {
    return view('template.dashboard.transaksi');
})->middleware(['auth', 'verified'])->name('transaksi');

Route::middleware('auth')->group(function () {
    Route::get('/akses', [AksesController::class, 'index'])->name('akses.index');
    Route::patch('/update/{id}', [AksesController::class, 'update'])->name('akses.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('index');
    Route::post('store', [BarangController::class, 'store'])->name('store');
    Route::put('update/{id}', [BarangController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [BarangController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::get('/transaksi/harga/{id}', [TransaksiController::class, 'getHarga'])->name('transaksi.getHarga');
});
Route::get('/transaksi/getHarga/{id}', function ($id) {
    $barang = \App\Models\Barang::find($id);
    return response()->json([
        'harga' => $barang ? $barang->harga : 0
    ]);
});


require __DIR__.'/auth.php';
