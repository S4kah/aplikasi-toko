<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangR;

class BarangRController extends Controller
{
    public function index()
    {
        // Mengambil semua data barang dan mengurutkannya berdasarkan yang terbaru
        $barangrs = BarangR::oldest();
        
        // Melakukan pencarian jika terdapat query 'search'
        if(request('search')) {
            $barangrs = $barangrs->where('nama_barang', 'LIKE', '%' . request('search') . '%');
        }
        
        $totalBarangR = BarangR::count();
        $barangs = Barang::all();
        $barangrs = BarangR::where('jenis_transaksi', 'Retur Barang')->simplePaginate(5);
        
        return view('admin.retur-barang', [
            'barangs' => $barangs,
            'barangrs' => $barangrs,
            'totalBarangR' => $totalBarangR,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|string|max:255',
            'nama_supplier' => 'required|string|max:255',
            'waktu_transaksi' => 'required|date', 
            'jenis_transaksi' => 'required',
        ]);
    
        // Membuat data baru di tabel barang
        BarangR::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'nama_supplier' => $request->nama_supplier,
            'waktu_transaksi' => $request->waktu_transaksi,
            'jenis_transaksi' => $request->jenis_transaksi,
        ]);
    
        return redirect()->route('admin.retur-barang.index')->with('success', 'Retur Barang berhasil ditambahkan.');
    }    
}
