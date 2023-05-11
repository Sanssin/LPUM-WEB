<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Election;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data input to event table
        $data = [
            'Pendaftaran',
            'Pengambilan No Urut',
            'Periode Kampanye',
            'Orasi I',
            'Orasi II',
            'Debat I',
            'Debat II',
            'Debat III',
            'Pencoblosan',
            'Pengumuman Hasil'
        ];

        foreach ($data as $d) :
            Event::create(['event_name' => $d]);
        endforeach;
    }
}
