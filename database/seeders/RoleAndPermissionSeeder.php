<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'view_all_data',
            'manage_users',
            'manage_branches',
            'manage_categories',
            'manage_items',
            'manage_stocks',
            'manage_stock_in_out',
            'view_transactions',
            'create_transactions',
            'validate_transactions',
            'view_reports',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Get existing roles
        $owner = Role::firstOrCreate(['name' => 'owner']);
        $manajer = Role::firstOrCreate(['name' => 'manajer']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor']);
        $kasir = Role::firstOrCreate(['name' => 'kasir']);
        $gudang = Role::firstOrCreate(['name' => 'gudang']);

        // Assign permissions to Owner
        $owner->syncPermissions(Permission::all());

        // Assign permissions to Manajer (manage users in their branch, view reports, view transactions)
        $manajer->syncPermissions([
            'manage_users',
            'view_reports',
            'view_transactions'
        ]);

        // Assign permissions to Supervisor (view & validate transactions)
        $supervisor->syncPermissions([
            'view_transactions',
            'validate_transactions'
        ]);

        // Assign permissions to Kasir (only POS / create_transactions)
        $kasir->syncPermissions([
            'create_transactions'
        ]);

        // Assign permissions to Gudang (stock management)
        $gudang->syncPermissions([
            'manage_stocks',
            'manage_stock_in_out'
        ]);
    }
}
