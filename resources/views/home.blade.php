@extends('layouts.app')

@section('content')
    <section class="content p-5">
        @if(auth()->user()->role == 'admin')
            <form action="{{ route('blog.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <label for="name">What <span class="text-red">*</span> </label>
                        <input type="text" name="what" id="what" class="form-control" required value="{{ $blog->what ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="name">Where <span class="text-red">*</span> </label>
                        <input type="text" name="where" id="where" class="form-control" required value="{{ $blog->where ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="name">When <span class="text-red">*</span> </label>
                        <input type="text" name="when" id="when" class="form-control" required value="{{ $blog->when ?? '' }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="name">Description <span class="text-red">*</span> </label>
                        <input type="text" name="description" id="description" class="form-control" required value="{{ $blog->description ?? '' }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form> 
        @else
            <div class="row">
                <div class="col-sm-8">
                    @if(auth()->user()->role != 'admin')
                    @php
                        if (auth()->user()->role == 'teacher') {
                            $courses = \DB::table('courses');
                            $courses = $courses->where('teacher_id',auth()->user()->id)->get();
                        } else {
                            $courses = \DB::table('courses');
                            $courses = $courses->join('course_students as cs','cs.course_id','courses.id')->where('cs.student_id',auth()->user()->id)->select('courses.id','courses.name')->get();
                        }
                    @endphp

                    <div class="row">
                        @foreach($courses as $i => $data)
                                <div class="col-sm-4">
                                    <a href="{{ route('course-students.course',$data->id) }}" style="">
                                        <div style="border:3px solid #fe9365; text-align:center;padding:5%;background-color:#e9ecef">
                                            <h5 style="color:#01a9ac"><strong>{{ $data->name ?? 'N/a' }}</strong></h5>
                                        </div>
                                    </a>
                                </div>
                        @endforeach
                    </div>

                @endif
                </div>
                <div class="col-sm-4">
                    <div class="jumbotron" style="border:2px solid #000">
                        <h1 class="display-4">What: {{ $blog->what ?? '' }}</h1>
                        <p class="lead">Where: {{ $blog->where ?? '' }}</p>
                        <p class="lead">When:{{ $blog->when ?? '' }}</p>
                        <hr class="my-4">
                        <p>{{ $blog->description ?? '' }}</p>
                    </div>
                </div>
            </div>
        @endif 
    </section>
@endsection
