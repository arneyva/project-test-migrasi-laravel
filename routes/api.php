<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/barangs', [BarangController::class, 'apiIndex']);
