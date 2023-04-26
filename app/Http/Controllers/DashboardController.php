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
}
