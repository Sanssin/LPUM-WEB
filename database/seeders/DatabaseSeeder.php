<?php

namespace Database\Seeders;

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
        // Menjalankan seeders lainnya
        $this->call([
            StudyProgramSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            OrganizationsSeeder::class,
            EventsSeeder::class,
        ]);

        // Mengimpor data dari file CSV atau Excel
        Excel::import(new UsersImport, storage_path('app/Untitled spreadsheet - test_users.csv')); // Pastikan path file benar

        // Menambahkan data ke tabel site_settings
        $settings = [
            'whatsapp',
            'email',
            'instagram',
            'instagram_link',
            'linkedin',
            'linkedin_link',
            'facebook',
            'facebook_link',
            'description',
        ];

        // Memasukkan data ke tabel site_settings
        foreach ($settings as $setting) {
            DB::table('site_settings')->insert(['data' => $setting]);
        }
    }
}
