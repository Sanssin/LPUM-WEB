<?php

namespace App\Actions\Candidate;

use App\Models\User;
use App\Models\Candidate;

class StoreCandidateAction
{
    public function handle($validatedData, $election,  $image)
    {
        try {
            // Cari ID Ketua
            $leader = User::select('id')->where('nim', $validatedData['leader_nim'])->first()->id;

            // Cari ID Wakil
            if ($validatedData['coleader_nim']) :
                $coleader = User::select('id')->where('nim', $validatedData['coleader_nim'])->first()->id;
            endif;

            // Simpan Gambar
            $fileName = $validatedData['leader_nim'] . $validatedData['coleader_nim'] . time();
            $image_path = $this->storeImage($fileName, $image);

            // Hapus variable yang tidak digunakan
            unset($validatedData['leader_nim']);
            unset($validatedData['coleader_nim']);

            // Masukkan data ke variabel yang benar sesuai database.
            $validatedData['leader_id'] = $leader;
            $validatedData['coleader_id'] = $coleader ?? null;
            $validatedData['election_id'] = $election;
            $validatedData['candidate_image'] = $image_path;

            Candidate::create($validatedData);
        } catch (\Throwable $th) {
            return false; // Apabila gagal menambahkan data
        }

        return true;
    }

    public function storeImage($fileName, $data)
    {
        $fullFileName = $fileName . '.' . $data->extension();
        $filePath = "candidate/$fullFileName";

        $data->storeAs("candidate", $fullFileName);

        return $filePath;
    }
}
