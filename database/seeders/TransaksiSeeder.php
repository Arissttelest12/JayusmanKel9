<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // TRANSAKSI
        DB::table('transaksi')->insert([
            [
                'id_cabang' => 1,
                'id_kasir' => 3,
                'tanggal_transaksi' => now(),
                'total_harga' => 6500,
                'metode_pembayaran' => 'cash',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // DETAIL TRANSAKSI
        DB::table('detail_transaksi')->insert([
            [
                'id_transaksi' => 1,
                'id_barang' => 1,
                'jumlah' => 1,
                'harga_satuan' => 3500,
                'subtotal' => 3500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 1,
                'id_barang' => 2,
                'jumlah' => 1,
                'harga_satuan' => 3000,
                'subtotal' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}