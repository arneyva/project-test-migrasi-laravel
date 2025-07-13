<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;

    protected $fillable = ['nama', 'kode', 'harga'];
    protected $table = 'barangs';
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'barang_id', 'id');
    }
}
