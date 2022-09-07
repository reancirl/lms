<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $post = new Post;
        $post->content = $request->content;
        $post->status = $request->status ? false : true;
        $post->author_id = auth()->user()->id;
        $post->course_id = $request->course_id;
        $post->deadline = $request->deadline;
        $post->priority = $request->priority ?? 'Normal';
        $post->overall_score = $request->overall_score;
        $post->type = $request->type ?? 'general';
        $post->save();
        return redirect()->back()->with('success','Post created!');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success','Post deleted!');
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
