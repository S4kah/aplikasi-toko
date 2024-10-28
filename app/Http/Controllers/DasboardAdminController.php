<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Pastikan untuk mengimpor model Kategori
use App\Models\Barang;
use App\Models\BarangM;
use App\Models\Jenis; 
use App\Models\User;
use Illuminate\Http\Request;

class DasboardAdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah kategori
        $jumlahKategori = Kategori::count();
        $jumlahBarang = Barang::count();
        $jumlahJenis = Jenis::count();
        $jumlahUser = User::count();
        $jumlahBarangM = BarangM::count();
        $jumlahBarangR = BarangM::count();

        // Mengembalikan view dengan data jumlahKategori
        return view('admin.dasboard-admin', compact('jumlahKategori','jumlahBarang','jumlahUser','jumlahJenis','jumlahBarangM','jumlahBarangR'));
    }
}
