<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Actions\Admin\UpdateUserAction;
use App\Http\Requests\UpdateUserViaAdminRequest;

class UserController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'users_excel' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $import = new UsersImport;
        Excel::import($import, $request->file('users_excel'));

        $count = $import->getCountRow();

        return back()->with("success", "Berhasil mengupdate $count user");
    }

    public function edit(User $user)
    {
        $title = 'Edit user';
        return view('Admin.edit-user', compact('title', 'user'));
    }

    public function update(UpdateUserViaAdminRequest $request, UpdateUserAction $action)
    {
        // Tangani semua proses update
        if (!$action->handle($request)) :
            return back()->with('error', 'error'); // Jika gagal kembalikan pesan error
        endif;

        return back()->with('success', 'success');
    }

    public function delete(Request $request)
    {
        // Tidak boleh menghapus user sendiri
        $data = collect($request->data);
        $data = $data
            ->reject(function ($item, $value) {
                return $item == auth()->user()->id;
            })
            ->toArray();
        // Hapus users
        User::destroy($data);

        return response()->json([
            'data' => 'Sukses'
        ]);
    }


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

    public function show(User $user)
    {
        $title = 'Detail Pengguna';

        return view('User.show', compact('title', 'user'));
    }
}
