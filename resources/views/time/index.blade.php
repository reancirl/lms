@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Time Scedule</h1>
        <a class="btn btn-primary btn-sm" href="{{ route('time.create') }}">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($time as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->start ?? '' }}</td>
                        <td>{{ $data->end ?? '' }}</td>
                        <td>{{ $data->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            {{-- <a href="{{ route('time.edit',$data->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                            {{-- <a href="" class="btn btn-primary btn-sm">Reset Password</a> --}}
                            <a href="{{ route('time.show',$data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
