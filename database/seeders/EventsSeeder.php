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
            'Orasi',
            'Debat I'
        ];

        foreach ($data as $d) :
            Event::create(['event_name' => $d]);
        endforeach;

        // Attach to Election
        $election = Election::find(1);

        $election->event()->attach(1, [
            'start_event' => '2022-08-13',
            'end_event' => '2022-08-14',
            'method' => 0,
            'location' => 'Zoom'
        ]);
        $election->event()->attach(2, [
            'start_event' => '2022-09-13',
            'end_event' => '2022-10-14',
            'method' => 1,
            'location' => 'Auditorium'
        ]);
    }
}
