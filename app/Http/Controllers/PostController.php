<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index($course_id,$post_id)
    {
        $post = Post::find($post_id);
        $res = Response::where('post_id',$post->id)->orderBy('created_at','desc')->get();
        return view('posts.index',compact('post','res'));
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

        if($request->file) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('', $fileName, 'public');
            $post->file_name = time().'_'.$request->file->getClientOriginalName();
            $post->file_path = '/storage/' . $filePath;
        }

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

    public function download(Request $request)
    {
        return Storage::disk('public')->download($request->path);
    }
}
