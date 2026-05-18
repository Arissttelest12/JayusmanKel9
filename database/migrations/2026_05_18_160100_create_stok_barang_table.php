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
        Schema::create('stok_barang', function (Blueprint $table) {
            $table->id('id_stok');
            $table->foreignId('id_cabang')
                ->constrained('cabang', 'id_cabang')
                ->cascadeOnDelete();

            $table->foreignId('id_barang')
                ->constrained('barang', 'id_barang')
                ->cascadeOnDelete();

            $table->integer('jumlah_stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_barang');
    }
};
