<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreElectionRequest;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ElectionController extends Controller
{
    //
    public function index()
    {
        $title = 'Informasi Pemilu';
        $latests = Election::orderByDesc('end_election')->ofStatus('active')->limit(3)->get();
        $oldests = Election::orderByDesc('end_election')->offset(2)->limit(99)->get();

        return view('Election.index', compact('title', 'latests', 'oldests'));
    }

    public function show(string $id)
    {
        $title = 'Pemilihan Ketua POSTER 2023';

        $election = Election::where('id', $id)->with('event')->first();

        return view('Election.show', compact('title', 'election'));
    }

    public function create()
    {
        $title = 'Tambah Pemilu';

        return view('Election.create', compact('title'));
    }

    public function store(StoreElectionRequest $request)
    {
        try {
            $validated = $request->validated();

            $file = $request->file('election_image');
            $fileName = $validated['election_name'] . $validated['election_period'] . time() . '.' . $file->extension();
            $filePath = "election/$fileName";

            $file->storeAs("election", $fileName);

            $validated['election_image'] = $filePath;

            Election::create($validated);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

        return to_route('admin.manageElection')->with('success', $validated['election_name'] . " telah ditambahkan!");
    }

    public function destroy(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'Method not allowed'
            ], 404);
        endif;

        try {
            $election = Election::find($request->data);

            if ($election->election_image && File::exists("storage/$election->election_image")) :
                File::delete("storage/$election->election_image");
            endif;

            $election->delete();
        } catch (\Throwable $e) {
            abort(404);
        }

        return response()->json([
            'message' => 'Sukses menghapus pemilu.'
        ]);
    }

    public function changeStatus(Request $request)
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

    public function coblos()
    {
        $title = "Info Pencoblosan";

        $elections = Election::ofStatus('active')->get();

        return view('Election.coblos', compact('title', 'elections'));
    }

    public function votePage(string $id)
    {
        $title = "Pemilihan ketua poster";

        $agenda = Election::where('id', $id)->with('voteTime')
            ->first()->voteTime->first()->agenda;

        $endTime = $agenda->end_event;

        if (now() < $agenda->start_event) :
            abort(401);
        endif;

        $candidates = Candidate::where('election_id', $id)
            ->with('leader:id,first_name,last_name', 'coleader:id,first_name,last_name')
            ->orderBy('number')->get();

        return view('Election.vote-page', compact('title', 'endTime', 'candidates', 'id'));
    }

    public function end(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'Method not allowed'
            ], 404);
        endif;

        try {
            $election = Election::find($request->data);

            $election->election_status = 'done';
            $election->save();
        } catch (\Throwable $e) {
            abort(404);
        }

        return response()->json([
            'message' => 'Sukses menghapus pemilu.'
        ]);
    }

    public function openResult(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'Method not allowed'
            ], 404);
        endif;

        try {
            $election = Election::find($request->data);

            $election->result_visibility = '1';
            $election->save();
        } catch (\Throwable $e) {
            abort(404);
        }

        return response()->json([
            'message' => 'Sukses menghapus pemilu.'
        ]);
    }
}
