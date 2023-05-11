<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VoteStat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ActivateAccount;
use App\Models\ElectionEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Pagu utama";
        $stats = [
            'users_count' => User::count(),
            'votes' => VoteStat::select(DB::raw('COUNT(election_id) as elect_count, 
            SUM(total_voter) as total, 
            SUM(voted) as total_vote, 
            SUM(golput) as total_golput'))
                ->get()->first()
        ];

        $latest_election = ElectionEvent::where('start_event', '<', now())->orderByDesc('start_event')->with('election', 'event')->first();

        return view('Dashboard.index', compact('title', 'stats', 'latest_election'));
    }

    public function agenda()
    {
        $title = "Jadwal";

        return view('Dashboard.agenda', compact('title'));
    }

    public function profile()
    {
        $title = 'Profil';
        return view('Dashboard.profile', compact('title'));
    }

    public function contact()
    {
        $title = 'Kontak';
        return view('Dashboard.contact', compact('title'));
    }

    public function testMail()
    {
        Mail::to('zahrawibow@gmail.com')
            ->queue(new ActivateAccount(Str::random(10)));

        return 'terkirim';
    }
}
