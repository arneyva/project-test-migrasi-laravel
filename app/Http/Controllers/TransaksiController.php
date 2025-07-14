<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::with('barang')->get();

        return view('template.dashboard.transaksi', [
            'barangs' => $barangs,
            'transaksis' => $transaksis,
        ]);
    }

    public function getHarga($id)
    {
        $barangs = Barang::find($id);

        return response()->json(['harga' => $barangs ? $barangs->harga : null]);
    }


   public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'quantity' => 'required|numeric|min:1',
    ]);

    $barang = Barang::findOrFail($request->barang_id);
    $quantity = $request->quantity;

    Transaksi::create([
        'barang_id'       => $barang->id,
        'tanggal'         => now()->toDateString(),
        'harga_satuan'    => $barang->harga,
        'quantity'        => $quantity,
        'total'           => $barang->harga * $quantity,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
}

    public function destroy($id)
    {
        Transaksi::destroy($id);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric',
        ]);

        $transaksis = Transaksi::findOrFail($id);
        $barangs = Barang::findOrFail($transaksis->barang_id);

        $transaksis->update([
            'quantity' => $request->quantity,
            'total' => $barangs->harga * $request->quantity,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }
}
