@extends('layouts.app')

@section('content')
    <section class="content p-5">
        <a class="btn btn-primary mb-5" href="{{ route('password') }}">Change password</a>
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row mb-3">
                <div class="col">
                    <label for="first_name">First Name <span class="text-red">*</span> </label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required value="{{ $user->first_name ?? '' }}">
                </div>
                <div class="col">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $user->middle_name ?? '' }}">
                </div>
                <div class="col">
                    <label for="last_name">Last Name <span class="text-red">*</span> </label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required value="{{ $user->last_name ?? '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" name="" id="email" class="form-control" required value="{{ $user->email ?? '' }}" readonly>
                </div>
                <div class="col">
                    <label for="id_number">ID Number</label>
                    <input type="text" name="" id="id_number" class="form-control" required value="{{ $user->id_number ?? '' }}" readonly>
                </div>
                <div class="col">
                    <label for="gender">Gender <span class="text-red">*</span> </label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="birthday">Birthday </label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $user->birthday }}">
                </div>
                <div class="col">
                    <label for="civil_status">Civil Status </label>
                    <select name="civil_status" id="civil_status" class="form-control">
                        <option value="">-- Select Civil Status --</option>
                        <option value="Married" {{ $user->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                        <option value="Separated" {{ $user->civil_status == 'Separated' ? 'selected' : '' }}>Separated</option>
                        <option value="Divorced" {{ $user->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                        <option value="Single" {{ $user->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </section>
@endsection
