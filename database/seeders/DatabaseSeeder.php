<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //cabang
        $this->call(CabangSeeder::class);

        // ROLE
        $ownerRole = Role::create(['name' => 'owner']);
        $manajerRole = Role::create(['name' => 'manajer']);
        $supervisorRole = Role::create(['name' => 'supervisor']);
        $kasirRole = Role::create(['name' => 'kasir']);
        $gudangRole = Role::create(['name' => 'gudang']);

        // USER OWNER
        $owner = User::create([
            'name' => 'Pak Jayusman',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $owner->assignRole($ownerRole);

        // USER MANAJER
        $manajer = User::create([
            'name' => 'Manajer Toko',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $manajer->assignRole($manajerRole);

        // USER KASIR
        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $kasir->assignRole($kasirRole);

        // USER ADMIN
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole($ownerRole);

        //kategori
        $this->call(KategoriBarangSeeder::class);

        //barang
        $this->call(BarangSeeder::class);

        //stok
        $this->call(StokBarangSeeder::class);

        //transaksi
        $this->call(TransaksiSeeder::class);

        //stok masuk & keluar
        $this->call(StokMasukSeeder::class);
        $this->call(StokKeluarSeeder::class);

        //log
        $this->call(LogAktivitasSeeder::class);
    }
}