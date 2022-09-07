@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>{{ $course->name }} ({{ $course->subject->name }})</h1>
        @csrf
        <hr>
        @foreach ($posts as $data)
            <div class="row mb-4 p-3 mx-2" style="background-color:rgb(244, 244, 244);border: 1px solid;box-shadow: 5px 5px #888888;">
                <div class="col-sm-12">
                    @if(auth()->user()->id == $data->author_id)
                        <a class="btn btn-danger btn-sm float-right" href="{{ route('posts.edit',$data->id) }}">Remove</a>
                    @endif
                    <p class="mb-1">{{ ucWords($data->author->last_name) }}, {{ ucWords($data->author->first_name) }} :</p>
                    @if($data->priority == 'High')
                        <strong class="text-danger">!! {{ $data->priority }} Priority | Deadline: {{ date('M d, Y', strtotime($data->deadline)) }} !!</strong>
                    @elseif($data->priority == 'Low')
                        <strong class="text-success">!! {{ $data->priority }} Priority | Deadline: {{ date('M d, Y', strtotime($data->deadline)) }} !!</strong>
                    @endif
                    <h4>{{ $data->content ?? 'N/a' }}</h4>
                    <span>Date posted: {{ date('M d, Y', strtotime($data->created_at)) }}</span> | <span class="text-success">5 Responses</span> 
                    <a href="{{ route('posts.index') }}?post_id={{$data->id}}" class="float-right">View Posts</a>
                </div>
            </div>
        @endforeach
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-sm-10">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <textarea name="content" id="" class="form-control" cols="20" rows="5" placeholder="Write post here" required></textarea>
                </div>
            </div>
            @if(auth()->user()->role == 'teacher')
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <label for="type">Post Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="general">Normal</option>
                            <option value="Assignment">Assignment</option>
                            <option value="Assignment">Quiz</option>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label for="priority_type">Priority Type</label>
                        <select name="priority" id="priority_type" class="form-control">
                            <option value="Normal">Normal</option>
                            <option value="High">High</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <label for="overall_score">Overall Score</label>
                        <input type="text" class="form-control" name="overall_score" placeholder="Overall score" id="overall_score">
                    </div>
                    <div class="col-sm-5">
                        <label for="date">Deadline</label>
                        <input type="date" id="date" class="form-control" name="deadline">
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col">
                    {{-- <button class="btn btn-secondary mt-2" type="submit" name="status" value="draft">Save as Draft</button> --}}
                    <button class="btn btn-primary" type="submit">Post</button>
                </div>
            </div>
        </form>
    </section>
@endsection
