<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'jenis',
        'harga_jual',
    ];
}
