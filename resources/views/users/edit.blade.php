@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Edit User</h1>
        <div class="alert alert-warning">
            Default user password is the ID Number!
        </div>
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
                    <label for="email">Email <span class="text-red">*</span> </label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ $user->email ?? '' }}">
                </div>
                <div class="col">
                    <label for="id_number">ID Number <span class="text-red">*</span> </label>
                    <input type="text" name="id_number" id="id_number" class="form-control" required value="{{ $user->id_number ?? '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="role">Role <span class="text-red">*</span> </label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="Student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="Teacher" {{ $user->role == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
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

            <div class="row mb-3">
                <div class="col">
                    <label for="type">Type <span class="text-red">(Only if user is student!)</span></label>
                    <select name="type" id="type" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="Pre-school" {{ $user->type == 'Pre-school' ? 'selected' : '' }}>Pre-school</option>
                        <option value="Elementary" {{ $user->type == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                        <option value="JHS" {{ $user->type == 'JHS' ? 'selected' : '' }}>JHS</option>
                        <option value="SHS" {{ $user->type == 'SHS' ? 'selected' : '' }}>SHS</option>
                        <option value="College" {{ $user->type == 'College' ? 'selected' : '' }}>College</option>
                    </select>
                </div>
                <div class="col">
                    <label for="year_level">Year/Grade Level <span class="text-red">(Only if user is student!)</span></label>
                    <input type="number" class="form-control" name="year_level" max="12" value="{{ $user->year_level }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>        
    </section>
@endsection
