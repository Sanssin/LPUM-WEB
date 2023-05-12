<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AddUserComponent extends Component
{
    public $first_name,
        $last_name,
        $email,
        $nim,
        $angkatan,
        $study_program;

    protected $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'nullable|min:3',
        'email' => 'required|email:dns|unique:users,email',
        'nim' => 'required|min:4|unique:users,nim',
        'angkatan' => 'required|numeric|min:2019',
        'study_program' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        try {
            $user = new User;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->nim = $this->nim;
            $user->study_program_id = $this->study_program;
            $user->angkatan = $this->angkatan;
            $user->password = Hash::make(Str::random(8));

            $user->save();
        } catch (\Throwable $e) {
            $this->addError('savingError', $e->getMessage());
        }

        $this->dispatchBrowserEvent('user-saved');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.add-user-component');
    }
}
