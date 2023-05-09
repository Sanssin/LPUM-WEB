<?php

namespace App\Actions\Admin;

use App\Models\User;

class UpdateUserAction
{
    public function handle($data): bool
    {
        $validated = $data->validated();

        $user = User::find($data->id);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->study_program_id = $validated['study_program'];
        $user->nim = $validated['nim'];

        $user->save();

        if (!$user->wasChanged()) :
            return false;
        endif;

        return true;
    }
}
