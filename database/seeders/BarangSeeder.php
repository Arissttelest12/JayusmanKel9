<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'id_kategori' => 1,
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Indomie Goreng',
                'harga_beli' => 2500,
                'harga_jual' => 3500,
                'satuan' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kategori' => 2,
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Aqua 600ml',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
                'satuan' => 'botol',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kategori' => 3,
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Sabun Mandi',
                'harga_beli' => 4000,
                'harga_jual' => 5500,
                'satuan' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}