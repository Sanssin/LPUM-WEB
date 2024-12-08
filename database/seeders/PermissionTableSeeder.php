<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage-users',
            'manage-voting',
            'verify-users',
            'promote-user',
            'voting-result',
        ];

        foreach ($permissions as $permission) {
            // Gunakan firstOrCreate untuk mencegah duplikasi permission
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
