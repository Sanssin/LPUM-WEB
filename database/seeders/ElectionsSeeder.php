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
            'start_election' => '2023-06-10',
            'end_election' => '2023-07-13',
        ];

        Election::create($data);
    }
}
