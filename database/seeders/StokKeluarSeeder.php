<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokKeluarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stok_keluar')->insert([
            [
                'id_cabang' => 1,
                'id_barang' => 3,
                'id_user' => 2,
                'jumlah' => 5,
                'tanggal_keluar' => now(),
                'alasan' => 'Barang rusak',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}