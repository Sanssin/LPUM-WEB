<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Imports\UsersImport;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            StudyProgramSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            // OrganizationsSeeder::class,
            ElectionsSeeder::class,
            EventsSeeder::class,
        ]);

        Excel::import(new UsersImport, 'laravel-lpum-test.csv');

        $this->call(CandidateSeeder::class);
    }
}
