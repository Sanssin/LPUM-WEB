<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Teknokimia Nuklir',
            'Elektronika Instrumentasi',
            'Elektro Mekanika'
        ];

        foreach ($data as $d) :
            StudyProgram::create(['study_program_name' => $d]);
        endforeach;
    }
}
