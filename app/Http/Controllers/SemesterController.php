<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semester = Semester::get();
        return view('semester.index',compact('semester'));
    }

    public function create()
    {
        return view('semester.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Semester $semester)
    {
        //
    }

    public function edit(Semester $semester)
    {
        //
    }

    public function update(Request $request, Semester $semester)
    {
        //
    }

    public function destroy(Semester $semester)
    {
        //
    }
}
