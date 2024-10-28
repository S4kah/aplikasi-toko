<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Awal query untuk mendapatkan data kategori
        $query = Kategori::oldest();
    
        // Mencari kategori jika ada parameter pencarian
        if (request('search')) {
            $query->where('nama_kategori', 'LIKE', '%' . request('search') . '%');
        }
    
        // Menghitung total semua kategori
        $totalKategori = Kategori::count();
    
        // Paginasi dengan 3 item per halaman, query tetap sama dengan pencarian
        $kategoris = $query->paginate(3);
    
        // Mengirimkan data kategori dan total kategori ke view
        return view('kategori.index', compact('kategoris', 'totalKategori'));
    }
    

    // Metode untuk menampilkan form tambah kategori
    public function create()
    {
        return view('kategori.create'); // Ganti dengan nama view yang sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori', // Validasi unik
        ]);
    
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Kirim data kategori ke view
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
