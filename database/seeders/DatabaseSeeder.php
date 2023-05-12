<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Imports\UsersImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            OrganizationsSeeder::class,
            EventsSeeder::class,
        ]);

        Excel::import(new UsersImport, 'laravel-lpum-test.csv');

        $settings = [
            'whatsapp',
            'email',
            'instagram',
            'instagram_link',
            'linkedin',
            'linkedin_link',
            'facebook',
            'facebook_link',
            'description'
        ];
        foreach ($settings as $setting) :
            DB::table('site_settings')->insert(['data' => $setting]);
        endforeach;
    }
}
