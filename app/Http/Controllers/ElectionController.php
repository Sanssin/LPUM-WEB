<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectionController extends Controller
{
    //
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
}
