<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        return view('template.dashboard.barang', compact('barangs'));
    }
    // Untuk AG Grid (data API JSON)
    public function apiIndex()
    {
        try {
            $data = Barang::all();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diambil',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => []
            ], 500);
        }
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'kode' => ['required', Rule::unique('barangs')],
            'harga' => ['required', 'numeric'],
        ]);

        DB::beginTransaction();
        try {
            $barang = new Barang;
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
            Log::error('Update barang gagal: ' . $e->getMessage());

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
