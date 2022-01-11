<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Document;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        $result = array();
        foreach ($documents as $document) {
            $doc = array("id" => $document->id, "title" => $document->title, "steps" => $document->steps,
            "created_at" => $document->created_at, "updated_at" => $document->updated_at);
            
            array_push($result, $doc);
        }

        return response()->json(["documents" => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'title' => 'required|string',
        ]);

        $document = new Document;

        $document->title = $request->title;

        $document->save();
        
        return response()->json(["message" => "Document succesfully created", "document" => $document], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);

        $result = array("id" => $document->id, "title" => $document->title, "steps" => $document->steps,
        "created_at" => $document->created_at, "updated_at" => $document->updated_at);

        return response()->json(["document" => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([ 
            'title' => 'required|string',
        ]);

        $document = Document::findOrFail($id);

        $document->title = $request->title;

        $document->save();
        return response()->json(["message" => "Document succesfully updated", "document" => $document], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        $document->delete();

        return response()->json(["message" => "Document succesfully deleted"], 200);
    }
}
