<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return $notes;
    }

    public function store($id, Request $request)
    {
        $validated = $request->validate([ 
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $note = new Note;

        $note->document_id = $id;
        $note->title = $request->title;
        $note->body = $request->body;

        $note->save();
        
        return response()->json(["message" => "Note succesfully created", "body" => $note], 200);
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);

        $notes = $document->notes;

        if ($notes->isEmpty()) {
            return response()->json(["message" => "No notes were found for this document"], 200);
        } else {
            return $notes;
        }
    }
}
