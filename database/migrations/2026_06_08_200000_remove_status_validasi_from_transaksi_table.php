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
        if (Schema::hasTable('transaksi') && Schema::hasColumn('transaksi', 'status_validasi')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->dropColumn('status_validasi');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('transaksi') && !Schema::hasColumn('transaksi', 'status_validasi')) {
            Schema::table('transaksi', function (Blueprint $table) {
                $table->enum('status_validasi', ['pending', 'valid', 'invalid'])->default('pending')->after('metode_pembayaran');
            });
        }
    }
};
