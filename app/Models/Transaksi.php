<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// App\Models\Transaksi.php
class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // pastikan nama ini benar

    protected $fillable = [
        'barang_id',
        'tanggal',
        'harga_satuan',
        'quantity',
        'total'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

