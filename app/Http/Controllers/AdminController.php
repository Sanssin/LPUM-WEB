<?php

namespace App\Http\Controllers;

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

class AdminController extends Controller
{
    public function manageUser(Request $request)
    {
        $title = 'Kelola User';

        $prodi_count = User::select(DB::raw("study_program_id,count(study_program_id) as count"))->groupBy('study_program_id')->get();
        $prodi_count = $prodi_count->mapWithKeys(function ($item, $key) {
            return [$item['study_program_id'] => $item['count']];
        })->toArray();

        $not_activate = DB::table('password_resets')->count();

        if ($request->all() == null) :
            $data = User::select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status')->with('study_program')->get();

        else :
            $data = User::select('id', 'first_name', 'last_name', 'study_program_id', 'nim', 'vote_status')
                ->where('study_program_id', $request->prodi)
                ->orWhere('vote_status', $request->active)
                ->with('study_program')->get();
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

    public function updateUser(UpdateUserViaAdminRequest $request)
    {
        $validated = $request->validated();

        $user = User::find($request->id);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->study_program_id = $validated['study_program'];
        $user->nim = $validated['nim'];

        $user->save();

        if (!$user->wasChanged()) :
            return back()->with('error', 'error');
        endif;

        return back()->with('success', 'success');
    }

    public function verify(Request $request)
    {
        $data = User::select('id', 'vote_status', 'nim')->whereIn('id', $request->users)->get();

        $not_voted = $data
            ->reject(function ($item, $key) {
                return $item['vote_status'] == 1;
            })
            ->map(function ($item, $key) {
                return $item['id'];
            })
            ->toArray();

        try {
            Election::findOrFail($request->election);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'ID tidak ada.'
            ], 400);
        }

        try {
            $count = User::whereIn('id', $not_voted)->update([
                'vote_status' => 1,
                'election_id' => $request->election
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => $count
        ]);
    }

    public function unverify(Request $request)
    {
        $data = User::select('id', 'vote_status', 'nim')->whereIn('id', $request->data)->get();

        $not_voted = $data->reject(function ($item, $key) {
            return $item['vote_status'] == 0;
        })
            ->map(function ($item, $key) {
                return $item['id'];
            })
            ->toArray();

        $count = User::whereIn('id', $not_voted)->update([
            'vote_status' => 0,
            'election_id' => null
        ]);

        return response()->json([
            'message' => $count
        ]);
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

    public function syncAgenda(StoreAgendaRequest $request)
    {
        $election = Election::find($request->election_id);

        $validated = $request->validated();

        $start_event = $validated['start_event'];
        $end_event = $validated['end_event'];
        $method = $validated['method'];
        $location = $validated['location'];

        $event = collect($validated['event']);

        $data = $event->mapWithKeys(function ($item, $key) use ($start_event, $end_event, $method, $location) {
            return [$item => [
                'method' => $method[$key],
                'start_event' => $start_event[$key],
                'end_event' => $end_event[$key],
                'location' => $location[$key]
            ]];
        })->toArray();

        switch ($request->action) {
            case 'sync':
                $election->event()->sync($data);
                $message = "mengisi ulang seluruh";
                break;

            case 'update':
                $election->event()->syncWithoutDetaching($data);
                $message = "memperbarui";
                break;
        }

        return back()->with('success', $message);
    }

    public function activate(Request $request)
    {
        $data = User::whereIn('id', $request->data)->get();

        $count = 0;

        try {
            foreach ($data as $user) {
                $token = Str::random(40);
                Mail::to($user->email)->send(new ActivateAccount($token, $user->full_name));
                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now()
                ]);
                $count++;
            }
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }

        return response()->json(
            [
                'message' => "Sukses!",
                'count' => $count
            ]
        );
    }
}
