<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    //
    public function index()
    {
        $title = "Daftar KM";

        return view('KM.index', compact('title'));
    }
}
