<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cabang;
use App\Models\User;
use App\Models\Transaksi;

class FactoryDummySeeder extends Seeder
{
    public function run()
    {
        if (method_exists(Cabang::class, 'factory')) {
            Cabang::factory()->count(3)->create();
        } else {
            Cabang::insert([
                ['nama_cabang' => 'Cabang A', 'kota' => 'Kota A', 'alamat' => 'Jl. A', 'created_at' => now(), 'updated_at' => now()],
                ['nama_cabang' => 'Cabang B', 'kota' => 'Kota B', 'alamat' => 'Jl. B', 'created_at' => now(), 'updated_at' => now()],
                ['nama_cabang' => 'Cabang C', 'kota' => 'Kota C', 'alamat' => 'Jl. C', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        $owner   = User::firstOrCreate(['email' => 'owner@demo.test'],   ['name' => 'Owner Demo',   'password' => bcrypt('password')]);
        $manajer = User::firstOrCreate(['email' => 'manajer@demo.test'], ['name' => 'Manajer Demo', 'password' => bcrypt('password')]);
        $kasir   = User::firstOrCreate(['email' => 'kasir@demo.test'],   ['name' => 'Kasir Demo',   'password' => bcrypt('password')]);

        try {
            if (method_exists($owner,   'assignRole')) { $owner->assignRole('owner'); }
        } catch (\Exception $e) {}
        try {
            if (method_exists($manajer, 'assignRole')) { $manajer->assignRole('manajer'); }
        } catch (\Exception $e) {}
        try {
            if (method_exists($kasir,   'assignRole')) { $kasir->assignRole('kasir'); }
        } catch (\Exception $e) {}

        if (method_exists(Transaksi::class, 'factory')) {
            Transaksi::factory()->count(12)->create();
        } else {
            $cabangIds = Cabang::pluck('id_cabang')->toArray();
           for ($i = 0; $i < 12; $i++) {
            Transaksi::create([
                'id_cabang'          => $cabangIds[array_rand($cabangIds)],
                'id_kasir'           => $kasir->id,
                'total_harga'        => rand(50000, 300000),
                'tanggal_transaksi'  => now()->subDays(rand(0, 30)),
                'metode_pembayaran'  => collect(['tunai', 'transfer', 'qris'])->random(),
            ]);
        }
        }
    }
}