@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Courses</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('courses.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $i => $data)
                    @if((auth()->user()->role == 'teacher' && $data->teacher_id == auth()->user()->id) || auth()->user()->role == 'admin' )
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><a href="{{ route('course-students.course',$data->id) }}">{{ $data->name ?? '' }}</a></td>
                            <td>{{ $data->semester ? $data->semester->name.' ('.$data->semester->type.')' : '' }}</td>
                            <td>{{ $data->subject ? $data->subject->name : '' }}</td>
                            <td>{{ $data->teacher ? ucFirst($data->teacher->last_name).', '.ucFirst($data->teacher->first_name) : '' }}</td>
                            <td>{{ $data->time ? $data->time->start.'-'.$data->time->end : '' }}</td>
                            <td>{{ $data->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('course-students.index') }}?course_id={{ $data->id }}" class="btn btn-primary btn-sm">View Student</a>
                                <a href="{{ route('courses.edit',$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('courses.show',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>                        
                    @endif
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
