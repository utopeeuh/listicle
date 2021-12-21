<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note as NoteModel;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        //find user and add to request
        $user_id = Auth::user()->id;
        $request->request->add(['user_id' => $user_id]);

        //remove token
        $data = $request->except('_token');

        //create new note
        NoteModel::insert($data);

        return redirect('/');
    }

    public function update(Request $request, $note_id)
    {
        //verify if current user == owner of note
        $note = NoteModel::findOrFail($note_id);
        $data = $request->except('_token');

        //update data
        if (Auth::user()->id == $note->user_id) {
            $note->update($data);
        }

        return redirect('/');
    }

    public function destroy($note_id)
    {
        $note = NoteModel::findOrFail($note_id);

        //update data
        if (Auth::user()->id == $note->user_id) {
            $note->delete();
        }

        return redirect('/');
    }

    public function clear()
    {
        NoteModel::where("user_id", '=', Auth::user()->id)->delete();
        return redirect('/');
    }

    public function toggledone(Request $request, $note_id)
    {
        $note = NoteModel::findOrFail($note_id);

        if ($note->isdone == 0)
            $note->isdone = 1;
        else
            $note->isdone = 0;

        $note->save();

        return redirect('/');
    }
}
