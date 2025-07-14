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
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
        ]);

        $barangs = Barang::findOrFail($request->barang_id);
        $quantity = $request->quantity;

        Transaksi::create([
            'barang_id' => $barangs->id,
            'user_id' => Auth::id(),
            'tanggal' => now()->toDateString(),
            'harga_transaksi' => $barangs->harga,
            'quantity' => $quantity,
            'total' => $barangs->harga * $quantity,
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
