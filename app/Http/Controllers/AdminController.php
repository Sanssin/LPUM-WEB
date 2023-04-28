<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function manageUser(Request $request)
    {
        $title = 'Kelola User';

        if ($request->all() == null) :
            $data = User::select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status')->with('study_program')->get();
        else :
            $data = User::select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status')
                ->where('study_program_id', $request->prodi)
                ->orWhere('vote_status', $request->active)
                ->with('study_program')->get();
        endif;

        return view('Admin.manage-user', compact('title', 'data'));
    }

    public function uploadUser(Request $request)
    {
        $request->validate([
            'users' => 'required|file'
        ]);

        $import = new UsersImport;
        Excel::import($import, $request->file('users'));

        $count = $import->getCountRow();

        return back()->with("success", "Berhasil mengupdate $count user");
    }

    public function verify(Request $request)
    {
        foreach ($request->data as $data) :
            User::where('id', $data)->update([
                'vote_status' => 1
            ]);
        endforeach;

        return response()->json([
            'data' => 'Sukses'
        ]);
    }

    public function unverify(Request $request)
    {
        foreach ($request->data as $data) :
            User::where('id', $data)->update([
                'vote_status' => 0
            ]);
        endforeach;

        return response()->json([
            'data' => 'Sukses'
        ]);
    }

    public function deleteUsers(Request $request)
    {
        User::destroy($request->data);

        return response()->json([
            'data' => 'Sukses'
        ]);
    }
}
