@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Create School Years</h1>
        <form action="{{ route('school-years.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="start">Start <span class="text-red">*</span> </label>
                    <select name="start" id="start" class="form-control">
                        <option value="">-- Select Start Year --</option>
                        @for($i = 2022; $i < 2035; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <label for="end">End <span class="text-red">*</span> </label>
                    <select name="end" id="end" class="form-control">
                        <option value="">-- Select End Year --</option>
                        @for($i = 2023; $i < 2036; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
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
