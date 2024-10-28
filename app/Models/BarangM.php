<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangM extends Model
{
    use HasFactory;

    protected $table = 'transaksi_barang';

    protected $fillable = [
        'nama_barang',
        'stok',
        'nama_supplier',
        'jenis_transaksi',
        'waktu_transaksi',
    ];
}
