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
        Schema::create('stok_keluar', function (Blueprint $table) {
            $table->id('id_stok_keluar');
            $table->foreignId('id_cabang')->constrained('cabang', 'id_cabang')->cascadeOnDelete();
            $table->foreignId('id_barang')->constrained('barang', 'id_barang')->cascadeOnDelete();
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->date('tanggal_keluar');
            $table->string('alasan', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_keluar');
    }
};
