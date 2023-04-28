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
            'election_name' => 'Pemira Ketua BEM',
            'election_period' => 2023,
            'start_election' => now(),
            'end_election' => now()->addDays(29),
            'election_image' => 'election/contoh-poster.jpg',
            'election_status' => 'active',
            'description' => fake()->sentences(4, true)
        ];

        Election::create($data);
    }
}
