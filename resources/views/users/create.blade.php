@extends('layouts.app')

@section('content')
    <section class="content">
        <h1>Create User</h1>
        <div class="alert alert-warning">
            Default user password is the ID Number!
        </div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="first_name">First Name <span class="text-red">*</span> </label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
                <div class="col">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="form-control">
                </div>
                <div class="col">
                    <label for="last_name">Last Name <span class="text-red">*</span> </label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="email">Email <span class="text-red">*</span> </label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="col">
                    <label for="id_number">ID Number <span class="text-red">*</span> </label>
                    <input type="text" name="id_number" id="id_number" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="role">Role <span class="text-red">*</span> </label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="col">
                    <label for="gender">Gender <span class="text-red">*</span> </label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="birthday">Birthday </label>
                    <input type="date" name="birthday" id="birthday" class="form-control">
                </div>
                <div class="col">
                    <label for="civil_status">Civil Status </label>
                    <select name="civil_status" id="civil_status" class="form-control">
                        <option value="">-- Select Civil Status --</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="type">Type <span class="text-red">(Only if user is student!)</span></label>
                    <select name="type" id="type" class="form-control">
                        <option value="">-- Select Type --</option>
                        <option value="Pre-school">Pre-school</option>
                        <option value="Elementary">Elementary</option>
                        <option value="JHS">JHS</option>
                        <option value="SHS">SHS</option>
                        <option value="College">College</option>
                    </select>
                </div>
                <div class="col">
                    <label for="year_level">Year/Grade Level <span class="text-red">(Only if user is student!)</span></label>
                    <input type="number" class="form-control" name="year_level" max="12">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>        
    </section>
@endsection
