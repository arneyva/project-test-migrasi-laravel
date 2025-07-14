
<?php

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'barang_id' => 1,
                'quantity' => 2,
                'harga_satuan' => 150000,
                'total' => 300000,
                'tanggal' => '2025-07-01',
            ],
            [
                'barang_id' => 2,
                'quantity' => 1,
                'harga_satuan' => 250000,
                'total' => 250000,
                'tanggal' => '2025-07-02',
            ],
            [
                'barang_id' => 3,
                'quantity' => 3,
                'harga_satuan' => 1250000,
                'total' => 3750000,
                'tanggal' => '2025-07-03',
            ],
            [
                'barang_id' => 1,
                'quantity' => 5,
                'harga_satuan' => 150000,
                'total' => 750000,
                'tanggal' => '2025-07-05',
            ],
            [
                'barang_id' => 2,
                'quantity' => 2,
                'harga_satuan' => 250000,
                'total' => 500000,
                'tanggal' => '2025-07-06',
            ],
            [
                'barang_id' => 3,
                'quantity' => 1,
                'harga_satuan' => 1250000,
                'total' => 1250000,
                'tanggal' => '2025-07-07',
            ],
        ];

        foreach ($data as $item) {
            Transaksi::create($item);
        }
    }
}
