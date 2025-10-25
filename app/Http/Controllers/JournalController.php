<?php

namespace App\Http\Controllers;
use App\Models\JournalEntry;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $entries = JournalEntry::orderBy('date','desc')->get();
        return view('journal.index', compact('entries'));
    }
}
