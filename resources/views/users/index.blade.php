@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Users</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->id_number }}</td>
                        <td>{{ $data->last_name }}, {{ $data->first_name }} {{ $data->middle_name }}</td>
                        <td>{{ $data->role }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('users.edit',$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            {{-- <a href="" class="btn btn-primary btn-sm">Reset Password</a> --}}
                            <a href="{{ route('users.show',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
