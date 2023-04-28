<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectionController extends Controller
{
    //
    public function index()
    {
        $title = 'Informasi Pemilu';

        return view('Election.index', compact('title'));
    }

    public function coblos()
    {
        $title = "Info Pencoblosan";

        return view('Election.coblos', compact('title'));
    }

    public function votePage()
    {
        $title = "Pemilihan ketua poster";

        return view('Election.vote-page', compact('title'));
    }

    public function result()
    {
        $title = 'Hasil pemilu';

        return view('Election.result', compact('title'));
    }

    public function showResult()
    {
        $title = 'Pemilu Ketua poster 2023';

        return view('Election.showResult', compact('title'));
    }
}
