<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UsersImport implements OnEachRow, WithHeadingRow, WithUpserts
{
    private $rows = 0;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function onRow(Row $row)
    {
        $user = User::upsert([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'password' => Hash::make("password"),
            'nim' => $row['nim'],
            'angkatan' => $row['angkatan'],
            'study_program_id' => $row['study_program_id'],
            'vote_status' => false
        ], 'nim');

        if (!$user) :
            $user->assignRole('User');
        endif;
        ++$this->rows;
    }

    public function uniqueBy()
    {
        return 'nim';
    }

    public function getCountRow()
    {
        return $this->rows;
    }
}
