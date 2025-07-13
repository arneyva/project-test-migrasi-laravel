<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('template.dashboard.barang', compact('barangs'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'kode' => ['required', Rule::unique('barangs')],
            'harga' => ['required', 'numeric']
        ]);

        DB::beginTransaction();
        try {
            $barang = new Barang();
            $barang->nama = $request->nama;
            $barang->kode = $request->kode;
            $barang->harga = $request->harga;
            $barang->save();

            DB::commit();

            return redirect()->route('dashboard.index')
                ->with('success', 'Barang berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Gagal menambahkan barang: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Barang gagal ditambahkan');
        }
    }
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'kode' => ['required', Rule::unique('barangs')->ignore($id)],
            'harga' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();
        try {
            $barang = Barang::findOrFail($id);

            $barang->update([
                'nama' => $request->nama,
                'kode' => $request->kode,
                'harga' => $request->harga,
            ]);

            DB::commit();

            return redirect()->route('dashboard.index')
                ->with('success', 'Barang berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Update barang gagal: " . $e->getMessage());

            return redirect()->back()->with('error', 'Barang gagal ditambahkan');
        }
    }
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        if ($barang->transaksi()->exists()) {
            return redirect()->back()->with('error', 'Barang memiliki transaksi sebelumnya, tidak dapat dihapus.');
        }
        $barang->delete();
        return redirect()->route('dashboard.index')->with('success', 'Barang berhasil dihapus');
    }
}
