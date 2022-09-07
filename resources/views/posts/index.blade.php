@extends('layouts.app')

@section('content')
    <section class="content pt-2">
        {{-- <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Go Back</a> --}}
        <h3>{!! nl2br($post->content) !!}</h3>
        <p class="pb-0 mb-0">Date Posted: {{ date('M d, Y', strtotime($post->created_at)) }}</p>
        <p class="pb-0 mb-0">Deadline: {{ date('M d, Y', strtotime($post->deadline)) }}</p>
        <p class="pb-0 mb-0">{{ $post->priority }} Priority</p>
        <hr>
        @foreach($res as $i => $data)
            <div class="row">
                <div class="col-sm-11">
                    <p class="mb-1 text-primary">{{ ucWords($data->author->last_name) }}, {{ ucWords($data->author->first_name) }} on {{ date('M d, Y', strtotime($post->created_at)) }}</p>
                    <h4>{!! nl2br($data->content) !!}</h4>
                    <hr>
                </div>
                <div class="col-sm-1">
                    @if(auth()->user()->id == $data->author_id)
                        <a class="btn btn-danger btn-sm float-right" href="{{ route('response.show',$data->id) }}">Remove</a>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-sm-10">
                <form action="{{ route('response.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="content" id="" class="form-control" cols="20" rows="5" placeholder="Write response here" required></textarea>
                    {{-- <button class="btn btn-secondary mt-2" type="submit" name="status" value="draft">Save as Draft</button> --}}
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </section>
@endsection
