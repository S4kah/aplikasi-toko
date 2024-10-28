<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_barang', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'nama_barang');
            $table->integer(column: 'stok');
            $table->string(column: 'nama_supplier');
            $table->enum(column: 'jenis_transaksi', allowed: ['Barang Masuk', 'Retur Barang']);
            $table->timestamp(column: 'waktu_transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_barang');
    }
};
