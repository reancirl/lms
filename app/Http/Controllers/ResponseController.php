<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $res = new Response;
        $res->post_id = $request->post_id;
        $res->author_id = auth()->user()->id;
        $res->content = $request->content;
        $res->status = 'saved';
        if($request->file) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('', $fileName, 'public');
            $res->file_name = time().'_'.$request->file->getClientOriginalName();
            $res->file_path = '/storage/' . $filePath;
        }
        $res->save();

        return redirect()->back()->with('success','Response save!');
    }

    public function show(Response $response)
    {
        $response->delete();
        return redirect()->back()->with('success','Response deleted!');
    }

    public function edit(Response $response)
    {
        //
    }

    public function update(Request $request, Response $response)
    {
        //
    }

    public function destroy(Response $response)
    {
        //
    }
}
