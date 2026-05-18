<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokBarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stok_barang')->insert([

            [
                'id_cabang' => 1,
                'id_barang' => 1,
                'jumlah_stok' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_cabang' => 1,
                'id_barang' => 2,
                'jumlah_stok' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_cabang' => 2,
                'id_barang' => 1,
                'jumlah_stok' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_cabang' => 3,
                'id_barang' => 3,
                'jumlah_stok' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}