<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeProfilePicture extends Component
{
    use WithFileUploads;

    public $photo;

    public function submit()
    {
        $this->validate(
            [
                'photo' => 'required|image|max:2048'
            ],
            [],
            [
                'photo' => 'Foto profil'
            ]
        );

        $filename = now()->timestamp . auth()->id() . '.' . $this->photo->getClientOriginalExtension();
        $folder = 'profile-photo';
        $filepath = $folder . '/' . $filename;

        $this->changeUserData($filepath);

        $this->photo->storeAs($folder, $filename);

        $this->dispatchBrowserEvent('photo-updated');
    }

    public function changeUserData(string $filepath): void
    {
        $this->checkUserImageExist();

        $user = auth()->user();
        $user->image = $filepath;
        $user->save();
    }

    public function checkUserImageExist(): void
    {
        if (File::exists("storage/" . auth()->user()->image)) {
            File::delete("storage/" . auth()->user()->image);
        }
    }

    public function render()
    {
        return view('livewire.change-profile-picture');
    }
}
