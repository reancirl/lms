@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Create School Years</h1>
        <form action="{{ route('semester.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name <span class="text-red">*</span> </label>
                    <input type="text" class="form-control" name="name" placeholder="First/Second/Third/Summer">
                </div>
                <div class="col">
                    <label for="school_year_id">School Year <span class="text-red">*</span> </label>
                    <select name="school_year_id" id="school_year_id" class="form-control" required>
                        <option value="">-- Select Start Year --</option>
                        @foreach($school_years as $i => $sy)
                            <option value="{{ $sy->id }}">{{ $sy->start }} - {{ $sy->end }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="type">Type <span class="text-red">*</span> </label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">-- Select Type --</option>
                        <option value="Pre-school">Pre-school</option>
                        <option value="Elementary">Elementary</option>
                        <option value="JHS">JHS</option>
                        <option value="SHS">SHS</option>
                        <option value="College">College</option>
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

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
