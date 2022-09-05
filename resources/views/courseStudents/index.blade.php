@extends('layouts.app')

@section('content')
    <section class="content">
        <h1><a href="{{ route('courses.index') }}">{{ $course->name }} ({{ $course->subject->name }})</a></h1>
        <form action="{{ route('course-students.store') }}" method="POST">
            @csrf
            <hr>
            <h4>Add Student </h4>
            <div class="row mb-3">
                <div class="col-sm-5">
                    <select name="student_id" class="form-control">
                        <option value="">-- Select Student --</option>
                        @foreach ($enrolees as $data)
                            <option value="{{ $data->id }}">{{ ucFirst($data->last_name) }}</b>, {{ ucFirst($data->first_name) }} {{ ucFirst($data->middle_name) }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="course_id" value="{{ $request->course_id }}">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <b>{{ ucFirst($data->student->last_name) }}</b>, {{ ucFirst($data->student->first_name) }} {{ ucFirst($data->student->middle_name) }}
                        </td>
                        <td>
                            {{ $data->grade ?? '' }}
                        </td>
                        <td>
                            <a href="{{ route('course-students.show',$data->id) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
