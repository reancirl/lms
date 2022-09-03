@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Edit Semester</h1>
        <form action="{{ route('semester.update',$semester->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col">
                    <label for="school_year_id">School Year <span class="text-red">*</span> </label>
                    <select name="school_year_id" id="school_year_id" class="form-control" required>
                        <option value="">-- Select Start Year --</option>
                        @foreach($school_years as $i => $sy)
                            <option value="{{ $sy->id }}" {{ $sy->id == $semester->school_year_id ? 'selected' : '' }}>{{ $sy->start }} - {{ $sy->end }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="type">Type <span class="text-red">*</span> </label>
                    <select name="type" id="type" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="Pre-school" {{ $semester->type == 'Pre-school' ? 'selected' : '' }}>Pre-school</option>
                        <option value="Elementary" {{ $semester->type == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                        <option value="JHS" {{ $semester->type == 'JHS' ? 'selected' : '' }}>JHS</option>
                        <option value="SHS" {{ $semester->type == 'SHS' ? 'selected' : '' }}>SHS</option>
                        <option value="College" {{ $semester->type == 'College' ? 'selected' : '' }}>College</option>
                    </select>
                </div>
                <div class="col">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="false" {{ $semester->status == false ? 'selected' : '' }}>Inactive</option>
                        <option value="true" {{ $semester->status == true ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
