<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::get();
        return view('subjects.index',compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $subject = new Subject;
        $subject->fill($request->except('status'));
        $subject->status = $request->status == 'true' ? true : false;
        $subject->save();
        return redirect('subjects')->with('success','Sucessfully created subject!');
    }

    public function show(Subject $subject)
    {
        $subject->delete();
        return redirect('subjects')->with('success','Sucessfully deleted subject!');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit',compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->fill($request->except('status'));
        $subject->status = $request->status == 'true' ? true : false;
        $subject->update();
        return redirect('subjects')->with('success','Sucessfully updated subject!');
    }
}
