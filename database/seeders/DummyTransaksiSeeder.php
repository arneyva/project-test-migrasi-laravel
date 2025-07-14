<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DummyTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat barang dummy dulu
        $barangs = [
            ['nama' => 'Pulpen', 'kode' => 'BRG001', 'harga' => 3000],
            ['nama' => 'Buku Tulis', 'kode' => 'BRG002', 'harga' => 5000],
            ['nama' => 'Penggaris', 'kode' => 'BRG003', 'harga' => 4000],
            ['nama' => 'Spidol', 'kode' => 'BRG004', 'harga' => 6000],
            ['nama' => 'Pensil', 'kode' => 'BRG005', 'harga' => 2000],
        ];

        foreach ($barangs as $data) {
            Barang::firstOrCreate(['kode' => $data['kode']], $data);
        }

        $barangList = Barang::all();

        foreach (range(1, 30) as $i) {
            $barang = $barangList->random();
            $qty = rand(1, 10);
            $harga = $barang->harga;
            $tanggal = Carbon::now()->subDays(rand(0, 30))->format('Y-m-d');

            Transaksi::create([
                'barang_id' => $barang->id,
                'quantity' => $qty,
                'harga_satuan' => $harga,
                'total' => $harga * $qty,
                'tanggal' => $tanggal,
            ]);
        }
    }
}
