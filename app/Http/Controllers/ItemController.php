<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $query = Barang::oldest();

        // Melakukan pencarian jika terdapat query 'search'
        if (request('search')) {
            $query->where('kode_barang', 'LIKE', '%' . request('search') . '%')
                ->orWhere('nama_barang', 'LIKE', '%' . request('search') . '%')
                ->orWhere('kategori', 'LIKE', '%' . request('search') . '%');
        }
        // Mengambil semua kategori
        $kategoris = Kategori::all();
        $jenis = Jenis::all();
        $totalBarang = Barang::count();
    
        $barangs = $query->paginate(3);

        // Mengambil data barang dengan paginasi 3 item per halaman
        $items = $query->paginate(3);

        // Mengirim data ke view
        return view('barang.index', compact('items', 'totalBarang'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $jenis = Jenis::all();
        $items = Item::get();

        // Mengirim data kategori ke view
        return view('barang.create', compact('barangs', 'jenis', 'items')); // Ganti dengan nama view yang sesuai
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'kode_barang' => 'required|string|max:255|unique:item,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'harga_awal' => 'required|integer',
        ]);

        // Membuat data baru di tabel barang
        Item::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kode_jenis,
            'jenis' => $request->harga_beli,
            'harga_awal' => $request->harga_jual,
        ]);

        return redirect()->route('kasir.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil kategori berdasarkan ID
        $items = Item::findOrFail($id);
        $barangs = Barang::all();
        $jenis = Jenis::all();

        // Kirim data kategori ke view
        return view('kasir.barang.edit', compact('items', 'barangs', 'jenis',));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:255|unique:item,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'kode_jenis' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|string|max:255',
            'diskon' => 'required|integer',
        ]);

        $items = Item::findOrFail($id);
        $items->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kode_jenis' => $request->kode_jenis,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
        ]);

        return redirect()->route('kasir.barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();

        return redirect()->route('kasir.barang.index')->with('success', 'Barang berhasil dihapus!');
    }
};
