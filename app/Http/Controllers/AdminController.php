<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\StoreCandidateRequest;
use App\Models\User;
use App\Imports\UsersImport;
use App\Models\Candidate;
use App\Models\Election;
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

    public function manageElection()
    {
        $title = 'Kelola Pemilihan';

        $elections = Election::all();

        return view('Admin.manage-election', compact('title', 'elections'));
    }

    public function changeElectionStatus(Request $request)
    {
        try {
            $election = Election::find($request->id);
            $election->election_status = $request->status;
            $election->save();
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

        return back()->with('success', 'success');
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

        $election->event()->sync($data);

        return back()->with('success', 'success');
    }

    public function manageCandidates(int $id)
    {
        $title =  "Kelola Kandidat";
        $candidates = Candidate::inElection($id);

        return view('Admin.manage-candidates', compact('title', 'candidates'));
    }

    public function createCandidate()
    {
        $title = 'Tambahkan kandidat';

        return view('Candidate.create', compact('title'));
    }

    public function storeCandidate(StoreCandidateRequest $request)
    {
        try {
            $validated = $request->validated();

            $leader = User::select('id')->where('nim', $validated['leader_nim'])->first()->id;
            $coleader = User::select('id')->where('nim', $validated['coleader_nim'])->first()->id;

            $file = $request->file('candidate_image');
            $fileName = $validated['leader_nim'] . $validated['coleader_nim'] . time() . '.' . $file->extension();
            $filePath = "candidate/$fileName";
            unset($validated['leader_nim']);
            unset($validated['coleader_nim']);
            $validated['leader_id'] = $leader;
            $validated['coleader_id'] = $coleader;
            $validated['election_id'] = $request->election;

            $file->storeAs("candidate", $fileName);

            $validated['candidate_image'] = $filePath;

            Candidate::create($validated);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

        return back()->with('success', 'success');
    }

    public function deleteCandidate(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'Method not allowed'
            ], 404);
        endif;

        try {
            $candidate = Candidate::find($request->data);
            $candidate->delete();
        } catch (\Throwable $e) {
            abort(404);
        }

        return response()->json([
            'message' => 'Sukses menghapus kandidat.'
        ]);
    }
}
