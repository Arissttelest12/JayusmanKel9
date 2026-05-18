<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogAktivitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('log_aktivitas')->insert([

            [
                'id_user' => 1,
                'aktivitas' => 'Menambahkan barang baru',
                'tabel_terkait' => 'barang',
                'id_data' => 1,
                'waktu' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_user' => 3,
                'aktivitas' => 'Melakukan transaksi penjualan',
                'tabel_terkait' => 'transaksi',
                'id_data' => 1,
                'waktu' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}