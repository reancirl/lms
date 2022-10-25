@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Department</h1>
        {{-- <a class="btn btn-primary btn-sm" href="{{ route('subjects.create') }}">Create</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($department as $i => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->name ?? '' }}</td>
                        <td>{{ $data->desc ?? '' }}</td>
                        <td>{{ $data->user_count ?? '0' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
