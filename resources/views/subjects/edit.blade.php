@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Edit Subjects</h1>
        <form action="{{ route('subjects.update',$subject->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name <span class="text-red">*</span> </label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ $subject->name ?? '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="type">Type <span class="text-red">*</span> </label>
                    <select name="type" id="type" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="Pre-school" {{ $subject->type == 'Pre-school' ? 'selected' : '' }}>Pre-school</option>
                        <option value="Elementary" {{ $subject->type == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                        <option value="JHS" {{ $subject->type == 'JHS' ? 'selected' : '' }}>JHS</option>
                        <option value="SHS" {{ $subject->type == 'SHS' ? 'selected' : '' }}>SHS</option>
                        <option value="College" {{ $subject->type == 'College' ? 'selected' : '' }}>College</option>
                    </select>
                </div>
                <div class="col">
                    <label for="status">Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="false" {{ $subject->status == false ? 'selected' : '' }}>Inactive</option>
                        <option value="true" {{ $subject->status == true ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
