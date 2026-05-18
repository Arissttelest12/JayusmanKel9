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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_cabang')
                ->constrained('cabang', 'id_cabang')
                ->cascadeOnDelete();
            $table->foreignId('id_kasir')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->date('tanggal_transaksi');
            $table->decimal('total_harga', 12, 2);
            $table->string('metode_pembayaran', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
