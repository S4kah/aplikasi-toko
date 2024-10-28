<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            switch ($user->role) {
                case 'admin':
                    return redirect()->route('dasboard-admin');
                case 'kasir':
                    return redirect()->route('dasboard-kasir');
                case 'kepala_toko':
                    return redirect()->route('dasboard-kepalatoko');
                default:
                    return redirect()->route('login');
            }
        } 
        else {
            return back()->withErrors(['login_error' => 'Invalid credentials']);
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

   public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,kasir,kepala_toko', // Validasi untuk role
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role; // Set role dari form
        $user->save();

        // Jangan langsung login, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
