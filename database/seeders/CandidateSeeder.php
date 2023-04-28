<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::insert([
            [
                'election_id' => 1,
                'leader_id' => 2,
                'number' => 1,
                'lead_position' => "Ketua",
                'vision' => fake()->sentence(4),
                'mission' => fake()->sentence(10),
                'slogan' => fake()->sentence(3)
            ],
            [
                'election_id' => 1,
                'leader_id' => 3,
                'number' => 2,
                'lead_position' => "Ketua",
                'vision' => fake()->sentence(4),
                'mission' => fake()->sentence(10),
                'slogan' => fake()->sentence(3)
            ],
        ]);
    }
}
