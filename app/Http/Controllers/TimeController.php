<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $time = Time::get();
        return view('time.index',compact('time'));
    }

    public function create()
    {
        return view('time.create');
    }

    public function store(Request $request)
    {
        $time = new Time;
        $time->start = $request->start_hour. ':' .$request->start_minute. ' ' .$request->start_am_pm;
        $time->end = $request->end_hour. ':' .$request->end_minute. ' ' .$request->end_am_pm;
        $time->status = true;
        $time->save();
        return redirect('time')->with('success','Sucessfully created time schedule!');
    }

    public function show(Time $time)
    {
        $time->delete();
        return redirect('time')->with('success','Sucessfully deleted time schedule!');
    }

    public function edit(Time $time)
    {
        return view('time.edit',compact('time'));
    }

    public function update(Request $request, Time $time)
    {
       
    }
}
