<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek dan buat pengguna admin jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'udinihsan604@gmail.com'], // Kondisi unik
            [ // Data yang akan dibuat jika belum ada
                'first_name' => 'Nur',
                'last_name' => 'Ihsanudin',
                'nim' => '022300013',
                'angkatan' => '2023',
                'study_program_id' => 2, // Nilai tetap untuk contoh
                'password' => Hash::make("password"),
                'phone' => "088216253010",
            ]
        );

        // Cek dan buat role Admin jika belum ada
        $roleAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $roleUser = Role::firstOrCreate(['name' => 'User']);

        // Ambil semua permissions dan asosiasikan dengan role Admin
        $permissions = Permission::all();
        $roleAdmin->syncPermissions($permissions);

        // Tetapkan role Admin ke pengguna yang baru dibuat
        if (!$user->hasRole('Admin')) {
            $user->assignRole($roleAdmin);
        }

        // Jika ingin membuat dummy users, gunakan factory
        // User::factory()->count(5)->create();
    }
}
