<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $query = User::oldest();
        if (request('search')) {
            $query->where('name', 'LIKE', '%' . request('search') . '%');    
        }

        $users = $query->paginate(3);

        $totalUser = User::count();

        // Array roles
        $roles = ['admin', 'kasir', 'kepala_toko'];

        return view('admin.user', compact('users', 'roles', 'totalUser'));
    }

    public function create()
    {
        $roles = ['admin', 'kasir', 'kepala_toko']; // Tambahkan array roles di sini
        return view('admin.createuser', compact('roles')); // Kirimkan 'roles' ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5|max:255',
            'role' => 'required|in:admin,kasir,kepala_toko',
        ]);

        // Menggunakan Hash untuk mengamankan password
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::find($id);
    
        // Redirect jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User tidak ditemukan.');
        }
    
        // Daftar role yang tersedia
        $roles = ['admin', 'kasir', 'kepala_toko'];
    
        return view('admin.edituser', compact('user', 'roles'));
    }
    
    

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:255', // password tidak wajib
            'role'  => 'required|in:admin,kasir,kepala_toko',
        ]);

        $user = User::findOrFail($id);

        $data = $request->only('name', 'email', 'role');

        // Jika password diisi, maka password akan di-update dan di-hash
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
