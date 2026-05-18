<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cabang')->insert([
            [
                'nama_cabang' => 'Cabang Cianjur',
                'kota' => 'Cianjur',
                'alamat' => 'Jl. Raya Cianjur No. 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Cabang Bandung',
                'kota' => 'Bandung',
                'alamat' => 'Jl. Asia Afrika No. 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Cabang Jakarta',
                'kota' => 'Jakarta',
                'alamat' => 'Jl. Sudirman No. 25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}