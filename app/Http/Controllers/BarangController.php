<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); // ambil semua data barang
        return view('template.dashboard.barang', compact('barangs')); // arahkan ke view
    }
}
