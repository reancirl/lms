<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('semester','subject','teacher','time')->get();
        return view('courses.index',compact('courses'));
    }

    public function create()
    {
        $semester = Semester::where('status',true)->get();
        $subject = Subject::get();
        $teacher = User::where('role','teacher')->get();
        $time = Time::get();

        return view('courses.create',compact('semester','subject','teacher','time'));
    }

    public function store(Request $request)
    {
        $course = new Course;
        $course->fill($request->except('status'));
        $course->status = $request->status == 'true' ? true : false;
        $course->save();
        return redirect('courses')->with('success','Sucessfully created courses!');
    }

    public function show(Course $course)
    {
        $course->delete();
        return redirect('courses')->with('success','Sucessfully deleted course!');
    }

    public function edit(Course $course)
    {
        $semester = Semester::where('status',true)->get();
        $subject = Subject::get();
        $teacher = User::where('role','teacher')->get();
        $time = Time::get();

        return view('courses.edit',compact('course','semester','subject','teacher','time'));
    }

    public function update(Request $request, Course $course)
    {
        $course->fill($request->except('status'));
        $course->status = $request->status == 'true' ? true : false;
        $course->update();
        return redirect('courses')->with('success','Sucessfully updated course!');
    }
}
