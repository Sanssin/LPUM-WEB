<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            'KALAM',
            'MAPALA WALANG',
            'Seni',
            'Basket',
            'Voli',
            'Futsal',
            'Beladiri',
            'Robotik',
            'PMK',
            'Riset',
            'Badminton',
            'HIMA Einsten',
            'HIMA EMC',
            'HIMA TKN',
            'BEM',
            'DPM',
            'MM',
            'LPUM'
        ];

        $image = [
            'kalam.jpg',
            'walang.png',
            'seni.png',
            'basket.png',
            'voli.jpg',
            'futsal.jpg',
            'beladiri.png',
            'robotik.jpeg',
            'pmk.png',
            'riset.png',
            'badminton.png',
            'hima-einsten.png',
            'hima-emc.png',
            'hima-tkn.png',
            'bem.png',
            'dpm.png',
            'mm.png',
            'lpum.png'
        ];

        $full_name = [
            'Keluarga Mahasiswa Islam',
            'Mahasiswa Pecinta Alam - Wahana Petualang',
            'Seni',
            'Basket',
            'Voli',
            'Futsal',
            'Beladiri',
            'Robotik',
            'PMK',
            'Riset',
            'Badminton',
            'Himpunan Mahasiswa - Elektronika Instrumentasi',
            'Himpunan Mahasiswa - ElektroMekanika',
            'Himpunan Mahasiswa - Teknokimia Nuklir',
            'Badan Ekskutif Mahasiswa',
            'Dewan Permusyawaratan Mahasiswa',
            'Mahkamah Mahasiswa',
            'Lembaga Pemilihan Umum Mahasiswa'
        ];

        foreach ($organizations as $key => $value) :
            Organization::create([
                'organization_name' => $value,
                'organization_period' => 2024,
                'organization_full_name' => $full_name[$key],
                'organization_image' => 'organization/' . $image[$key]
            ]);
        endforeach;
    }
}
