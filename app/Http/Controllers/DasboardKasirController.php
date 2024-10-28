<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DasboardKasirController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        // Mengembalikan view dengan data jumlahKategori
        return view("kasir.dasboard-kasir", compact('totalBarang',));
        
    }
}
