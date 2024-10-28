<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        // Awal query untuk mendapatkan data kategori
        $query = Jenis::oldest();
            
        // Mencari kategori jika ada parameter pencarian
        if (request('search')) {
            $query->where('name_jenis', 'LIKE', '%' . request('search') . '%');
        }

        $kategoris = Kategori::all();
        // Menghitung total semua kategori
        $totalJenis = Jenis::count();

        // Paginasi dengan 3 item per halaman, query tetap sama dengan pencarian
        $jenis = $query->paginate(3);

        // Mengirimkan data kategori dan total kategori ke view
        return view('admin.jenis', compact('jenis', 'kategoris', 'totalJenis'));
    }

    public function create()
    {
        // Mengambil semua kategori dari database
        $kategoris = Kategori::all();

        // Mengirim data kategori ke view
        return view('admin.createjenis', compact('kategoris')); // Ganti dengan nama view yang sesuai
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_jenis' => 'required|string|max:255|unique:jenis,name_jenis',
            'kategori' => 'required|string|max:255|unique:jenis,kategori',
        ]);

        Jenis::create([
            'name_jenis' => $request->name_jenis,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.jenis.index')->with('success', 'Jenis barang Berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil kategori berdasarkan ID
        $jenis = Jenis::findOrFail($id);
        $kategoris = Kategori::all(); // Ambil kategori untuk digunakan di form edit

        // Kirim data kategori ke view
        return view('admin.editjenis', compact('jenis', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_jenis' => 'required|string|max:255|unique:jenis,name_jenis',
            'kategori' => 'required|string|max:255',
        ]);

        $jenis = Jenis::findOrFail($id);
        $jenis->update([
            'name_jenis' => $request->name_jenis,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('admin.jenis.index')->with('success', 'Jenis Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('admin.jenis.index')->with('success', 'Jenis Barang berhasil dihapus!');
    }
}
