@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Create Course</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name <span class="text-red">*</span> </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col">
                    <label for="semester_id">Semester <span class="text-red">*</span> </label>
                    <select name="semester_id" id="semester_id" class="form-control" required>
                        @foreach($semester as $i => $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->school_year->start }}-{{ $d->school_year->end }}) - {{ $d->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="subject_id">Subject <span class="text-red">*</span> </label>
                    <select name="subject_id" id="subject_id" class="form-control" required>
                        <option value="">-- Select Subject --</option>
                        @foreach($subject as $i => $d)
                            <option value="{{ $d->id }}">{{ $d->name }} ({{ $d->type }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="false">Inactive</option>
                        <option value="true">Active</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <label for="teacher_id">Teacher <span class="text-red">*</span> </label>
                    <select name="teacher_id" id="teacher_id" class="form-control" required>
                        <option value="">-- Select Teacher --</option>
                        @foreach($teacher as $i => $d)
                            <option value="{{ $d->id }}">{{ ucFirst($d->last_name) }}, {{ ucFirst($d->first_name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="time_id">Schedule Time </label>
                    <select name="time_id" id="time_id" class="form-control" required>
                        <option value="">-- Select Time --</option>
                        @foreach($time as $i => $d)
                            <option value="{{ $d->id }}">{{ $d->start }} - {{ $d->end }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
