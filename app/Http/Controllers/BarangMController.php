<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangM;

class BarangMController extends Controller
{
   public function index()
    {
        // Mengambil semua data barang dan mengurutkannya berdasarkan yang terbaru
        $barangms = BarangM::oldest();

        // Melakukan pencarian jika terdapat query 'search'
        if(request('search')) {
            $barangms = $barangms->where('nama_barang', 'LIKE', '%' . request('search') . '%');
        }

        $totalBarangM = BarangM::count();
        $barangs = Barang::all();
        $barangms = BarangM::where('jenis_transaksi', 'Barang Masuk')->simplePaginate(5);

        return view('admin.barang-masuk', [
            'barangs' => $barangs,
            'barangms' => $barangms,
            'totalBarangM' => $totalBarangM,
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
        BarangM::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'nama_supplier' => $request->nama_supplier,
            'waktu_transaksi' => $request->waktu_transaksi,
            'jenis_transaksi' => $request->jenis_transaksi,
        ]);
    
        return redirect()->route('admin.barang-masuk.index')->with('success', 'Barang Masuk berhasil ditambahkan.');
    }    
}
