<?php

namespace App\Http\Controllers;

use App\Http\Requests\HtmlSnippetRequest;
use App\Models\HtmlSnippet;
use Illuminate\Http\Request;

class HtmlSnippetController extends Controller
{
    /**
     * Display a listing of the codes .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HtmlSnippet::all();
    }


    /**
     * Store a newly created codes snippet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HtmlSnippetRequest $request)
    {
        $html = HtmlSnippet::create($request->all());

        return response()->json($html, 201);
    }

    
    /**
     * Update the specified code snippet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HtmlSnippetRequest $request, HtmlSnippet $htmlSnippet)
    {
        $htmlSnippet->update($request->all());

        return response()->json($htmlSnippet, 200);
    }

    /**
     * Remove the specified codes snippet from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtmlSnippet $htmlSnippet)
    {
        $htmlSnippet->delete();
        
        return response()->json(null, 204);
    }
}
