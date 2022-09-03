<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index()
    {
        $schoolyears = SchoolYear::get();
        return view('schoolyears.index',compact('schoolyears'));
    }

    public function create()
    {
        return view('schoolyears.create');
    }

    public function store(Request $request)
    {
        $schoolyear = new SchoolYear;
        $schoolyear->start = $request->start;
        $schoolyear->end = $request->end;
        $schoolyear->status = $request->status == 'true' ? true : false;
        $schoolyear->save();
        return redirect('school-years')->with('success','Sucessfully created School year!');
    }

    public function show(SchoolYear $schoolYear)
    {
        $schoolYear->delete();
        return redirect('school-years')->with('success','Sucessfully deleted School year!');
    }

    public function edit(SchoolYear $schoolYear)
    {
        return view('schoolyears.edit',compact('schoolYear'));
    }

    public function update(Request $request, SchoolYear $schoolYear)
    {
        $schoolYear->start = $request->start;
        $schoolYear->end = $request->end;
        $schoolYear->status = $request->status == 'true' ? true : false;
        $schoolYear->update();
        return redirect('school-years')->with('success','Sucessfully updated School year!');
    }

    public function destroy(SchoolYear $schoolYear)
    {
        //
    }
}
