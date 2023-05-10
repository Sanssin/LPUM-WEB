<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function index()
    {
        $title = "Daftar KM";
        $organizations = Organization::all();

        return view('KM.index', compact('title', 'organizations'));
    }
}
