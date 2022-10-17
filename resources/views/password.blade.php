@extends('layouts.app')

@section('content')
    <section class="content p-5">
        <a class="btn btn-primary mb-5" href="{{ route('account') }}">User Details</a>
        @error('password')
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <form action="{{ route('update-password',auth()->user()->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col">
                    <label for="password">New Password </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </section>
@endsection
