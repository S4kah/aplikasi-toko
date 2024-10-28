<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // Mengambil semua data barang dan mengurutkannya berdasarkan yang terbaru
        $query = Barang::oldest();

        // Melakukan pencarian jika terdapat query 'search'
        if(request('search')) {
            $query->whereAny(['kode_barang', ], 'LIKE', '%' . request('search') . '%');    
        }
        // Mengambil semua kategori
        $kategoris = Kategori::all();
        $jenis = Jenis::all();
        $totalBarang = Barang::count();
    
        $barangs = $query->paginate(3);
    
        return view('admin.barang', compact('barangs', 'kategoris', 'jenis', 'totalBarang'));            
        }

    public function make()
        {
            // Mengambil semua kategori dari database
            $kategoris = Kategori::all();
            $jenis = Jenis::all();
    
            // Mengirim data kategori ke view
            return view('admin.createbarang', compact('kategoris','jenis')); // Ganti dengan nama view yang sesuai
        }

    public function create(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kode_barang' => 'required|string|max:255|unique:barang,kode_barang',
            'nama_barang' => 'required|string|max:255|unique:barang,nama_barang',
            'kategori' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga_awal' => 'required|integer|unique:barang,harga_awal',
        ]);

        // Membuat data baru di tabel barang
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'harga_awal' => $request->harga_awal,
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // public function store(Request $request)
    // {
    //     $number = mt_rand(1000000000,9999999999);

    //     if ($this->barcodeExists($number)){
    //         $number = mt_rand(1000000000,999999999);
    //     }
    //     $request['barcode'] = $number;
    //     Barang::create($request->all());
        
    //     return redirect()->route('admin.barang.index')->with('success', 'Barang Masuk berhasil ditambahkan.');
    // }

    // public function barcodeExists($number)
    // {
    //     // Memeriksa apakah barcode sudah ada di tabel barang
    //     return Barang::where('barcode', $number)->exists();
    // }

    public function edit($id)
    {
        // Ambil kategori berdasarkan ID
        $barangs = Barang::findOrFail($id);
        $kategoris = Kategori::all(); // Ambil kategori untuk digunakan di form edit
        $jenis = Jenis::all(); // Ambil kategori untuk digunakan di form edit

        // Kirim data kategori ke view
        return view('admin.editbarang', compact('barangs','jenis', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga_awal' => 'required|integer',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'harga_awal' => $request->harga_awal,
        ]);

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus!');
    }
};