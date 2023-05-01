<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Joko',
            'last_name' => 'Widodo',
            'email' => 'bomsiwor@gmail.com',
            'nim' => fake()->numberBetween(1234, 9999),
            'study_program_id' => fake()->numberBetween(1, 3),
            'password' => Hash::make("password"),
            'phone' => "087733547844"
        ]);

        $role = Role::create(['name' => 'Admin'], ['name' => 'User']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // $users = User::factory()->count(5)->create();
    }
}
