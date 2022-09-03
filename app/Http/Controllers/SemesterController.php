<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = Semester::with('school_year')->get();
        return view('semester.index',compact('semester'));
    }

    public function create()
    {
        $school_years = SchoolYear::get();
        return view('semester.create',compact('school_years'));
    }

    public function store(Request $request)
    {
        $semester = new Semester;
        $semester->fill($request->except('status'));
        $semester->status = $request->status == 'true' ? true : false;
        $semester->save();
        return redirect('semester')->with('success','Sucessfully created semester!');
    }

    public function show(Semester $semester)
    {
        $semester->delete();
        return redirect('semester')->with('success','Sucessfully deleted semester!');
    }

    public function edit(Semester $semester)
    {
        $school_years = SchoolYear::get();
        return view('semester.edit',compact('semester','school_years'));
    }

    public function update(Request $request, Semester $semester)
    {
        $semester->fill($request->except('status'));
        $semester->status = $request->status == 'true' ? true : false;
        $semester->update();
        return redirect('semester')->with('success','Sucessfully updated semester!');
    }
}
