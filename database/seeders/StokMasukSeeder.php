<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokMasukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stok_masuk')->insert([
            [
                'id_cabang' => 1,
                'id_barang' => 1,
                'id_user' => 2,
                'jumlah' => 50,
                'tanggal_masuk' => now(),
                'keterangan' => 'Restok supplier',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}