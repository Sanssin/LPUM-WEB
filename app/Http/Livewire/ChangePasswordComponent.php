<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordComponent extends Component
{
    public $currentPassword, $newPassword, $newPassword_confirmation;
    public $successful = false;

    protected $rules = [
        'currentPassword' => 'required|current_password',
        'newPassword' => 'required_with:currentPassword|nullable|min:8|confirmed',
    ];

    protected $validationAttributes = [
        'currentPassword' => 'Kata sandi terdaftar',
        'newPassword' => 'Kata sandi baru',
    ];

    public function submit()
    {
        $this->successful = false;
        $this->validate();

        $user = auth()->user();

        $user->password = Hash::make($this->newPassword);

        $user->save();


        $this->reset();
        $this->successful = true;
    }

    public function render()
    {
        return view('livewire.change-password-component');
    }
}
