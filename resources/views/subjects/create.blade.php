@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Create Subjects</h1>
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="name">Name <span class="text-red">*</span> </label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="type">Type <span class="text-red">*</span> </label>
                    <select name="type" id="type" class="form-control">
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
