<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
   
    public function index()
    {
        $barang = Barang::all();
        $transaksi = Transaksi::with('barang')->get();

        $dataTransaksi = DB::table('transaksi')
            ->join('barang', 'transaksi.barang_id', '=', 'barang.id')
            ->selectRaw('DATE(tanggal) as date, SUM(quantity * harga) as total_transaksi')
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderBy(DB::raw('DATE(tanggal)'))
            ->get();

        $labels = $dataTransaksi->pluck('date');
        $totalTransaksi = $dataTransaksi->pluck('total_transaksi')->map(fn ($t) => (int) $t);

        return view('transaksi.index', [
            'barang' => $barang,
            'transaksi' => $transaksi,
            'labels' => $labels->toJson(),
            'total_transaksi' => $totalTransaksi->toJson(),
            'target' => 500000
        ]);
    }

    public function getHarga($id)
    {
        $barang = Barang::find($id);
        return response()->json(['harga' => $barang ? $barang->harga : null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $quantity = $request->quantity;

        Transaksi::create([
            'barang_id' => $barang->id,
            'user_id' => Auth::id(),
            'tanggal' => now()->toDateString(),
            'harga_transaksi' => $barang->harga,
            'quantity' => $quantity,
            'total' => $barang->harga * $quantity,
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

        $transaksi = Transaksi::findOrFail($id);
        $barang = Barang::findOrFail($transaksi->barang_id);

        $transaksi->update([
            'quantity' => $request->quantity,
            'total' => $barang->harga * $request->quantity
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }
}
