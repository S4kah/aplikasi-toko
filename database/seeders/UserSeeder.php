<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Ganti dengan password yang lebih aman
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        User::create([
            'name' => 'kepala_toko',
            'email' => 'kepala_toko@gmail.com',
            'password' => Hash::make('kepalatoko123'),
            'role' => 'kepala_toko',
        ]);
    }
}
