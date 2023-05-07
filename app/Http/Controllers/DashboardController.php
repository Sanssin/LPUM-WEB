<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ActivateAccount;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Pagu utama";

        return view('Dashboard.index', compact('title'));
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

    public function testMail()
    {
        Mail::to('zahrawibow@gmail.com')
            ->queue(new ActivateAccount(Str::random(10)));

        return 'terkirim';
    }
}
