<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DasboardAdminController;
use App\Http\Controllers\DasboardKasirController;
use App\Http\Controllers\DasboardKepalatokoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BarangMController;
use App\Http\Controllers\BarangRController;
use App\Http\Controllers\ItemController;
use App\Models\BarangM;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
});

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes (Require Authentication)
Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::get('/dbadmin', [DasboardAdminController::class, 'index'])->name('dasboard-admin');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('index');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::get('/jenis-barang', [JenisController::class, 'index'])->name('jenis');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/barang-masuk', [BarangMController::class, 'index'])->name('barang-masuk');
    Route::get('/retur-barang', [BarangMController::class, 'index'])->name('retur-barang');

    //kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create'); // Rute untuk menampilkan formulir tambah kategori
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    
    //barang
    Route::prefix('admin')->group(function () {
    Route::get('/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::get('/barang/make', [BarangController::class, 'make'])->name('admin.barang.make'); // Rute untuk menampilkan formulir tambah kategori
    Route::post('/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('admin.barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');
    });

    //jenis
    Route::get('/jenis-barang', [JenisController::class, 'index'])->name('admin.jenis.index');
    Route::get('/jenis-barang/create', [JenisController::class, 'create'])->name('admin.jenis.create'); // Rute untuk menampilkan formulir tambah kategori
    Route::post('/jenis-barang/store', [JenisController::class, 'store'])->name('admin.jenis.store');
    Route::get('/jenis-barang/{id}/edit', [JenisController::class, 'edit'])->name('admin.jenis.edit');
    Route::put('/jenis-barang/{id}', [JenisController::class, 'update'])->name('admin.jenis.update');
    Route::delete('/jenis-barang/{id}', [JenisController::class, 'destroy'])->name('admin.jenis.destroy');
    
    //barang-masuk
    Route::get('/barang-masuk', [BarangMController::class, 'index'])->name('admin.barang-masuk.index');
    Route::post('/barang-masuk/store', [BarangMController::class, 'store'])->name('admin.barang-masuk.store');
    
    //retur-barang
    Route::get('/retur-barang', [BarangRController::class, 'index'])->name('admin.retur-barang.index');
    Route::post('/retur-barang/store', [BarangRController::class, 'store'])->name('admin.retur-barang.store');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // Kasir Routes
    Route::get('/dbkasir', [DasboardKasirController::class, 'index'])->name('dasboard-kasir');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/barang', [ItemController::class, 'index'])->name('index');
    
    Route::prefix('kasir')->group(function () {
        //Item
        Route::get('/barang', [ItemController::class, 'index'])->name('barang.index');
        Route::get('/barang/create', [ItemController::class, 'create'])->name('barang.create'); // Rute untuk menampilkan formulir tambah kategori
        Route::post('/item/store', [ItemController::class, 'store'])->name('barang.store');
        Route::get('/barang/{id}/edit', [ItemController::class, 'edit'])->name('barang.edit');
        Route::put('/barang/{id}', [ItemController::class, 'update'])->name('barang.update');
        Route::delete('/ItemControllerbarang/{id}', [ItemController::class, 'destroy'])->name('barang.destroy');
    });

    // Kepala Toko Routes
    Route::get('/dbkepalatoko', [DasboardKepalatokoController::class, 'index'])->name('dasboard-kepalatoko');
    Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan');
    Route::get('/laporan-barang-masuk', [LaporanBarangMasukController::class, 'index'])->name('laporan-barang-masuk');

    
});
