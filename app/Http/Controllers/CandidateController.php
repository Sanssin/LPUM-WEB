<?php

namespace App\Http\Controllers;

use App\Actions\Candidate\StoreCandidateAction;
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

    public function store(StoreCandidateRequest $request, StoreCandidateAction $action)
    {
        // Ambil data yang tervalidasi
        $validated = $request->validated();
        $election_id = $request->election; // Kirimkan id Pemilu

        // Tangani & simpan data
        if (!$action->handle($validated, $election_id, $request->file('candidate_image'))) :
            return back()->with('error', 'Gagal menambahkan data!');
        endif;

        return to_route('candidate.show', ['id' => $request->election])->with('success', 'sukses');
    }

    public function changeNumber(Request $request)
    {
        $this->checkAjaxRequest($request);

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
        $this->checkAjaxRequest($request);

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

    public function checkAjaxRequest(Request $request)
    {
        if (!$request->ajax()) :
            return response()->json([
                'message' => 'Method not allowed'
            ], 404);
        endif;
    }
}
