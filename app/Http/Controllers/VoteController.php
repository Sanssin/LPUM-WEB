<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use App\Models\Election;
use App\Models\VoteStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'vote' => $request->data,
            'election_id' => $request->election
        ];

        try {
            DB::transaction(function () use ($data) {
                Vote::create($data);
                $user = User::find(auth()->id());

                $user->vote_status = 2;

                $user->save();
            });
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage()
                ],
                404
            );
        }

        return response()->json(
            [
                'message' => 'Sukses mencoblos!'
            ]
        );
    }

    public function result()
    {
        $title = 'Hasil pemilu';
        $stats = VoteStat::select(DB::raw('COUNT(election_id) as elect_count, 
        SUM(total_voter) as total, 
        SUM(voted) as total_vote, 
        SUM(golput) as total_golput'))
            ->get()->first();

        $elections = Election::with('resultTime')->ofStatus('active')->get();

        return view('Election.result', compact('title', 'elections', 'stats'));
    }

    public function showResult(int $id)
    {
        $title = 'Pemilu Ketua poster 2023';

        $election = Election::find($id);
        $stats = VoteStat::find($id);
        $votes = Vote::where('election_id', $id)->select(DB::raw('count(vote) as vote_number, vote'))
            ->groupBy('vote')
            ->get()
            ->pluck('vote_number', 'vote');

        $candidates = Candidate::select('number', 'leader_id', 'coleader_id')
            ->where('election_id', $id)
            ->with('leader:id,first_name,last_name', 'coleader:id,first_name,last_name')
            ->orderBy('number')
            ->get();

        $candidatePairs = $candidates->map(function ($item, $key) {
            $leaderName = $item['leader']->full_name;
            $coleaderName = $item['coleader'] ? '-' . $item['coleader']->full_name : '';
            return $leaderName . $coleaderName;
            // return $leaderName;
        });

        $voteNumber = $candidates->map(function ($item, $key) use ($votes) {
            return $votes[$item['number']] ?? 0;
        });

        return view('Election.showResult', compact(
            'title',
            'stats',
            'election',
            'id',
            'candidatePairs',
            'voteNumber'
        ));
    }
}
