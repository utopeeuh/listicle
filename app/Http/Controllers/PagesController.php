<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note as NoteModel;


class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = NoteModel::where("user_id", "=", Auth::user()->id)
            ->orderByRaw("FIELD(priority, \"high\", \"medium\", \"low\")")->get();
        // $notes = Auth::user()->notes;
        return view('index', ['notes' => $notes]);
    }
}
