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

        // Attach to Election
        // $election = Election::find(1);

        // $election->event()->attach(1, [
        //     'start_event' => now()->addDay()->setTime(8, 0),
        //     'end_event' => now()->addDays(7)->setTime(16, 30),
        //     'method' => 'online',
        //     'location' => 'Zoom'
        // ]);

        // $election->event()->attach(2, [
        //     'start_event' => now()->addDays(10)->setTime(13, 0),
        //     'end_event' => now()->addDays(10)->setTime(14, 30),
        //     'method' => 'offline',
        //     'location' => 'Auditorium'
        // ]);

        // $election->event()->attach(3, [
        //     'start_event' => now()->addDays(11)->setTime(7, 0),
        //     'end_event' => now()->addDays(17)->setTime(23, 59),
        //     'method' => 'offline',
        //     'location' => 'Bebas'
        // ]);

        // $election->event()->attach(4, [
        //     'start_event' => now()->addDays(12)->setTime(14, 0),
        //     'end_event' => now()->addDays(12)->setTime(14, 59),
        //     'method' => 'offline',
        //     'location' => 'Auditorium'
        // ]);

        // $election->event()->attach(6, [
        //     'start_event' => now()->addDays(13)->setTime(14, 0),
        //     'end_event' => now()->addDays(13)->setTime(16, 59),
        //     'method' => 'offline',
        //     'location' => 'Auditorium'
        // ]);

        // $election->event()->attach(7, [
        //     'start_event' => now()->addDays(20)->setTime(14, 0),
        //     'end_event' => now()->addDays(20)->setTime(16, 59),
        //     'method' => 'offline',
        //     'location' => 'Auditorium'
        // ]);

        // $election->event()->attach(9, [
        //     'start_event' => now()->addDays(24)->setTime(9, 0),
        //     'end_event' => now()->addDays(28)->setTime(16, 0),
        //     'method' => 'online',
        //     'location' => 'Web LPUM'
        // ]);
        // $election->event()->attach(10, [
        //     'start_event' => now()->addDays(28)->setTime(17, 0),
        //     'end_event' => now()->addDays(28)->setTime(18, 0),
        //     'method' => 'online',
        //     'location' => 'Web LPUM'
        // ]);
    }
}
