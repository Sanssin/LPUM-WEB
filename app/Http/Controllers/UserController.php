<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function deletePicture(Request $request)
    {
        if (File::exists("storage/" . auth()->user()->image)) {
            File::delete("storage/" . auth()->user()->image);
        }

        $this->deleteUserImageData();

        return response([
            'message' => 'Sukses'
        ]);
    }

    public function deleteUserImageData(): void
    {
        $user = auth()->user();
        $user->image = null;
        $user->save();
    }
}
