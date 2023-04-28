<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
