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
     * Menangani setiap baris yang dibaca
     *
     * @param Row $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function onRow(Row $row)
    {
        $rowData = $row->toArray();

        // Melakukan upsert untuk menambahkan atau memperbarui data berdasarkan 'nim'
        $user = User::updateOrCreate(
            ['nim' => $rowData['nim']],  // Kunci unik, dalam hal ini 'nim'
            [
                'first_name' => $rowData['first_name'],
                'last_name' => $rowData['last_name'],
                'email' => $rowData['email'],
                'password' => Hash::make("password"),
                'angkatan' => $rowData['angkatan'],
                'study_program_id' => $rowData['study_program_id'],
                'vote_status' => false
            ]
        );

        // Pastikan peran 'User' diberikan jika user berhasil dibuat
        if ($user && !$user->hasRole('User')) {
            $user->assignRole('User');
        }

        // Increment jumlah baris yang berhasil diimpor
        ++$this->rows;
    }

    /**
     * Tentukan kolom unik yang digunakan untuk upsert
     *
     * @return string
     */
    public function uniqueBy()
    {
        return 'nim';  // Kolom yang akan digunakan untuk mengecek apakah user sudah ada
    }

    /**
     * Menghitung jumlah baris yang telah diproses
     *
     * @return int
     */
    public function getCountRow()
    {
        return $this->rows;
    }

    /**
     * Tentukan mulai dari baris berapa data dibaca
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua
    }

    /**
     * Tentukan apakah baris pertama adalah header
     *
     * @return int
     */
    public function headingRow(): int
    {
        return 1; // Baris pertama adalah header
    }
}
