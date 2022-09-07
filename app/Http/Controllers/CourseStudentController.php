<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\User;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::find($request->course_id);
        $students_id = CourseStudent::where('course_id',$course->id)->pluck('student_id');
        $students = CourseStudent::where('course_id',$course->id)->get();
        $enrolees = User::where('role','student')->whereNotIn('id',$students_id)->get();
        return view('courseStudents.index',compact('course','students','enrolees','request'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new CourseStudent;
        $data->course_id = $request->course_id;
        $data->student_id = $request->student_id;
        $data->save();

        return redirect()->back()->with('success','Student added!');
    }

    public function show(CourseStudent $courseStudent)
    {
        $courseStudent->delete();
        return redirect()->back()->with('success','Student deleted!');
    }

    public function edit(CourseStudent $courseStudent)
    {
        //
    }

    public function update(Request $request, CourseStudent $courseStudent)
    {
        //
    }

    public function destroy(CourseStudent $courseStudent)
    {
        //
    }

    public function grade(Request $request, $id) 
    {
        foreach ($request->student_id as $i => $student_id) {
            $cs = CourseStudent::where('student_id',$student_id)->where('course_id',$id)->first();
            $cs->final_grade = $request->final_grade[$i];
            $cs->save();
        }
        return redirect()->back()->with('success','Student graded successfully!');
    }

    public function course($id)
    {
        $course = Course::find($id);
        $posts = Post::where('course_id',$id)->where('status',true)->orderBy('created_at','desc')->get();
        return view('courseStudents.course',compact('course','posts'));
    }
}