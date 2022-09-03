@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Semester</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('semester.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>School Year</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semester as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->name ?? 'N/a' }}</td>
                        <td>{{ $data->school_year->start }} - {{ $data->school_year->end }}</td>
                        <td>{{ $data->type ?? '' }}</td>
                        <td>{{ $data->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('semester.edit',$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            {{-- <a href="" class="btn btn-primary btn-sm">Reset Password</a> --}}
                            <a href="{{ route('semester.show',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
