<?php

namespace App\Actions\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ActivateAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class SendActivationAction
{
    public $response = [
        'code' => 200,
        'message' => "Sukses!"
    ];

    public function handle($data)
    {
        $data = User::whereIn('id', $data)->get();

        $count = 0;

        $delay = 0;
        try {
            foreach ($data as $user) {
                $token = Str::random(40);
                $delay += 4;
                // Mail::to($user->email)->send(new ActivateAccount($token, $user->full_name));
                Mail::to($user->email)
                    ->later(now()->addMinutes($delay), new ActivateAccount($token, $user->full_name));

                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now()
                ]);

                $user->activation_status = 'sent';
                $user->save();

                $count++;
            }
        } catch (\Throwable $e) {
            $this->response['message'] = $e->getMessage();
            $this->response['code'] = 404;
            return $this->response;
        }

        $this->response['count'] = $count;
        return $this->response;
    }
}
