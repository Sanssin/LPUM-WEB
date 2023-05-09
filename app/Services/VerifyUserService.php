<?php

namespace App\Services;

use App\Models\User;
use App\Models\Election;

class VerifyUserService
{
    public $response = [
        'code' => 200
    ];

    public function handleVerify($data): array
    {
        $users = User::select('id', 'vote_status', 'nim')->whereIn('id', $data->users)->get();

        $not_voted = $users
            ->reject(function ($item, $key) {
                return $item['vote_status'] == 1;
            })
            ->map(function ($item, $key) {
                return $item['id'];
            })
            ->toArray();

        $this->checkElection($data->election);

        try {
            $count = $this->changeVoteStatus($not_voted, $data->election);
        } catch (\Throwable $e) {
            $this->response['message'] = $e->getMessage();
            $this->response['code'] = 400;

            return $this->response;
        }

        $this->response['message'] = $count;

        return $this->response;
    }

    public function handleUnverify($data): array
    {
        $users = User::select('id', 'vote_status', 'nim')->whereIn('id', $data->data)->get();

        $not_voted = $users
            ->reject(function ($item, $key) {
                return $item['vote_status'] == 0;
            })
            ->map(function ($item, $key) {
                return $item['id'];
            })
            ->toArray();

        try {
            $count = User::whereIn('id', $not_voted)->update([
                'vote_status' => 0,
                'election_id' => null
            ]);
        } catch (\Throwable $e) {
            $this->response['message'] = $e->getMessage();
            $this->response['code'] = 404;

            return $this->response;
        }

        $this->response['message'] = $count;

        return $this->response;
    }

    private function checkElection($election)
    {
        try {
            Election::findOrFail($election);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'ID tidak ada.'
            ], 400);
        }
    }

    private function changeVoteStatus($users_id, $election_id)
    {
        return User::whereIn('id', $users_id)->update([
            'vote_status' => 1,
            'election_id' => $election_id
        ]);
    }
}
