<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;

class CandidateController extends Controller
{
    public function show(int $id)
    {
        $title =  "Kelola Kandidat";
        $candidates = Candidate::inElection($id);

        return view('Admin.manage-candidates', compact('title', 'candidates', 'id'));
    }

    public function create(int $id)
    {
        $title = 'Tambahkan kandidat';

        return view('Candidate.create', compact('title', 'id'));
    }

    public function store(StoreCandidateRequest $request)
    {
        try {
            $validated = $request->validated();

            $leader = User::select('id')->where('nim', $validated['leader_nim'])->first()->id;

            if ($request->coleader_nim) :
                $coleader = User::select('id')->where('nim', $validated['coleader_nim'])->first()->id;
            endif;

            $file = $request->file('candidate_image');
            $fileName = $validated['leader_nim'] . $validated['coleader_nim'] . time() . '.' . $file->extension();
            $filePath = "candidate/$fileName";
            unset($validated['leader_nim']);
            unset($validated['coleader_nim']);
            $validated['leader_id'] = $leader;
            $validated['coleader_id'] = $coleader ?? null;
            $validated['election_id'] = $request->election;

            $file->storeAs("candidate", $fileName);

            $validated['candidate_image'] = $filePath;

            Candidate::create($validated);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

        return to_route('candidate.show', ['id' => $request->election])->with('success', 'sukses');
    }

    public function changeNumber(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'error',
            ], 404);
        endif;

        try {
            $candidate = Candidate::find($request->id);

            $candidate->number = $request->number;
            $candidate->save();
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'sukses'
        ]);
    }

    public function destroy(Request $request)
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
