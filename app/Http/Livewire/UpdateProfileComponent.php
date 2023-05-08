<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateProfileComponent extends Component
{
    public $first_name,
        $last_name,
        $email,
        $nim,
        $phone,
        $address,
        $instagram,
        $twitter,
        $linkedin;

    public $show_phone,
        $show_address,
        $show_socmed;

    protected $rules = [
        'first_name' => 'required|min:2',
        'last_name' => 'nullable|min:2',
        'email' => 'required|email:dns',
        'nim' => 'required',
        'phone' => 'nullable'
    ];

    public function submit()
    {
        $this->validate();

        $data = auth()->user();

        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->email = $this->email;
        $data->nim = $this->nim;
        $data->phone = $this->phone;
        $data->address = $this->address;
        $data->instagram = $this->instagram;
        $data->twitter = $this->twitter;
        $data->linkedin = $this->linkedin;

        $data->show_phone = $this->show_phone;
        $data->show_address = $this->show_address;
        $data->show_socmed = $this->show_socmed;

        $data->save();

        $this->dispatchBrowserEvent('profile-updated');
    }

    public function mount()
    {
        $data = auth()->user();
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->email = $data->email;
        $this->nim = $data->nim;
        $this->phone = $data->phone;
        $this->address = $data->address;
        $this->instagram = $data->instagram;
        $this->twitter = $data->twitter;
        $this->linkedin = $data->linkedin;

        $this->show_address = $data->show_address;
        $this->show_socmed = $data->show_socmed;
        $this->show_phone = $data->show_phone;
    }


    public function render()
    {
        return view('livewire.update-profile-component');
    }
}
