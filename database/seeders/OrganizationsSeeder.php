<?php

namespace Database\Seeders;

use App\Models\User;
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
            'walang',
            'pers beta',
            'bela diri'
        ];

        $user = User::find(1);

        foreach ($organizations as $org) :
            $data =  Organization::create(['organization_name' => $org, 'organization_period' => 2019]);
            $user->organization()->attach($data->id);
        endforeach;
    }
}
