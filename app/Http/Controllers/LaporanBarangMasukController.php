<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBarangMasukController extends Controller
{
    public function index()
    {
        return view("laporan-barang-masuk");
    }
}
