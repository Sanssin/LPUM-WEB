<?php

namespace App\Http\Controllers;

use App\Actions\Admin\SendActivationAction;
use App\Actions\Admin\UpdateUserAction;
use App\Models\User;
use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Mail\ActivateAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateUserViaAdminRequest;
use App\Services\SyncAgendaService;
use App\Services\VerifyUserService;

class AdminController extends Controller
{
    public function manageUser(Request $request)
    {
        $title = 'Kelola User';

        // Pencacah jumlah user per prodi
        $prodi_count = $this->getProdiCount();

        // Pencacah user belum mengaktifkan akun
        $not_activate = DB::table('password_resets')->count();

        // Menampilkan data sesuai filter
        if ($request->all() == null) :
            $data = User::withoutAdminFilter();
        else :
            $data = User::withAdminFilter($request->prodi, $request->active);
        endif;

        return view('Admin.manage-user', compact('title', 'data', 'prodi_count', 'not_activate'));
    }

    public function uploadUser(Request $request)
    {
        $request->validate([
            'users_excel' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $import = new UsersImport;
        Excel::import($import, $request->file('users'));

        $count = $import->getCountRow();

        return back()->with("success", "Berhasil mengupdate $count user");
    }

    public function editUser(User $user)
    {
        $title = 'Edit user';
        return view('Admin.edit-user', compact('title', 'user'));
    }

    public function updateUser(UpdateUserViaAdminRequest $request, UpdateUserAction $action)
    {
        // Tangani semua proses update
        if (!$action->handle($request)) :
            return back()->with('error', 'error'); // Jika gagal kembalikan pesan error
        endif;

        return back()->with('success', 'success');
    }

    public function verify(Request $request, VerifyUserService $service)
    {
        // Tangani dengan servis
        // Mengembalikan array respons dari service
        $responseService = $service->handleVerify($request);

        return response()->json([
            'message' => $responseService['message']
        ], $responseService['code']);
    }

    public function unverify(Request $request, VerifyUserService $service)
    {
        // Tangani dengan service
        // Mengembalikan response
        $responseService = $service->handleUnverify($request);

        return response()->json([
            'message' => $responseService['message']
        ], $responseService['code']);
    }

    public function deleteUsers(Request $request)
    {
        User::destroy($request->data);

        return response()->json([
            'data' => 'Sukses'
        ]);
    }

    public function manageElection()
    {
        $title = 'Kelola Pemilihan';

        $elections = Election::all();

        return view('Admin.manage-election', compact('title', 'elections'));
    }

    public function manageElectionAgenda(int $id)
    {
        $title = 'Kelola Agenda Pemilihan';

        $election = Election::where('id', $id)->with('event')->firstOrFail();

        return view('Admin.manage-election-agenda', compact('title', 'election'));
    }

    public function syncAgenda(StoreAgendaRequest $request, SyncAgendaService $service)
    {
        $message = $service->handle($request->election_id, $request, $request->action);


        return back()->with('success', $message);
    }

    public function activate(Request $request, SendActivationAction $action)
    {
        $responseData = $action->handle($request->data);

        return response()->json(
            $responseData,
            $responseData['code']
        );
    }

    public function truncateActivation(Request $request)
    {
        DB::table('password_resets')->truncate();

        return back()->with('success', 'Mereset data aktivasi');
    }

    public function getProdiCount()
    {
        $data = User::select(DB::raw("study_program_id,count(study_program_id) as count"))->groupBy('study_program_id')->get();
        $count = $data->mapWithKeys(function ($item, $key) {
            return [$item['study_program_id'] => $item['count']];
        })->toArray();

        return $count;
    }

    public function manageSites()
    {
        $title = 'Kelola Situs';
        $data = DB::table('site_settings')->get();

        $data = $data->mapWithKeys(function ($value, $key) {
            return [$value->data => $value->value];
        })->toArray();

        return view('Admin.manage-site', compact('title', 'data'));
    }

    public function updateSite(Request $request)
    {
        $validated = $request->validate([
            'instagram' => 'nullable',
            'instagram_link' => 'required_with:instagram',
            'linkedin' => 'nullable',
            'linkedin_link' => 'required_with:linkedin',
            'facebook' => 'nullable',
            'facebook_link' => 'required_with:facebook',
            'description' => 'required',
            'whatsapp' => 'required'
        ]);

        $datas = collect($validated)
            ->reject(function ($value, $key) {
                return $value == null;
            })
            ->toArray();

        foreach ($datas as $key => $value) :
            DB::table('site_settings')->where('data', $key)->update([
                'value' => $value
            ]);
        endforeach;

        return back()->with('success', 'success');
    }
}
