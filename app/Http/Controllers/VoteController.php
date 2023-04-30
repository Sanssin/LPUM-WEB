<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
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
}
