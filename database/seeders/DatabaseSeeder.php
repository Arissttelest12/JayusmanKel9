<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Role
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Membuat Admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        // Membuat User Biasa
        $user = User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole($userRole);
    }
}
