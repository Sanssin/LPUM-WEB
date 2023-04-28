<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    //
    public function index()
    {
        $title = 'Informasi Pemilu';
        $latests = Election::orderByDesc('end_election')->limit(3)->get();
        $oldests = Election::orderByDesc('end_election')->offset(2)->limit(99)->get();

        return view('Election.index', compact('title', 'latests', 'oldests'));
    }

    public function show(string $id)
    {
        $title = 'Pemilihan Ketua POSTER 2023';

        $election = Election::where('id', $id)->with('event')->first();

        return view('Election.show', compact('title', 'election'));
    }

    public function coblos()
    {
        $title = "Info Pencoblosan";

        $elections = Election::ofStatus('active');

        return view('Election.coblos', compact('title', 'elections'));
    }

    public function votePage(string $id)
    {
        $title = "Pemilihan ketua poster";

        $data = Election::where('id', $id)->with('voteTime')->first()->voteTime->first()->agenda->end_event->isoFormat('M/d/Y HH:mm:ss');

        dd($data);

        return view('Election.vote-page', compact('title'));
    }

    public function result()
    {
        $title = 'Hasil pemilu';
        $elections = Election::with('resultTime')->get();

        return view('Election.result', compact('title', 'elections'));
    }

    public function showResult()
    {
        $title = 'Pemilu Ketua poster 2023';

        return view('Election.showResult', compact('title'));
    }
}
