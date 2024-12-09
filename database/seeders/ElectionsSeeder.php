<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ElectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'election_name' => 'Pemilihan Ketua Hima Einsten.com',
            'election_period' => 2024,
            'start_election' => now(),
            'end_election' => now()->addDays(29),
            'election_image' => 'election/contoh-poster.jpg',
            'election_status' => 'active',
            'description' => fake()->sentences(4, true)
        ];

        Election::create($data);
    }
}
