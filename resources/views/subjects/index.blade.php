@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Subjects</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('subjects.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->name ?? '' }}</td>
                        <td>{{ $data->type ?? '' }}</td>
                        <td>{{ $data->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('subjects.edit',$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            {{-- <a href="" class="btn btn-primary btn-sm">Reset Password</a> --}}
                            <a href="{{ route('subjects.show',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
