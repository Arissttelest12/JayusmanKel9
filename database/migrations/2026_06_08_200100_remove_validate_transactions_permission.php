<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('permissions')) {
            // Remove permission record and its role assignments
            DB::table('role_has_permissions')->whereIn('permission_id', function ($q) {
                $q->select('id')->from('permissions')->where('name', 'validate_transactions');
            })->delete();

            DB::table('permissions')->where('name', 'validate_transactions')->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('permissions')) {
            // Recreate permission if not exists
            $exists = DB::table('permissions')->where('name', 'validate_transactions')->exists();
            if (!$exists) {
                DB::table('permissions')->insert([
                    'name' => 'validate_transactions',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
};
