<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-left">
        <img src="{{asset('assets/custome/images/logo_bckgrnd.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'LMS') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{asset('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucWords(auth()->user()->last_name) ?? 'N/a' }}, {{ ucWords(auth()->user()->first_name) ?? 'N/a' }} </a>
                @if(auth()->user()->role != 'admin')
                    <strong class="text-white">{{ auth()->user()->id_number ?? 'N/a' }}</strong>
                @endif
            </div>
        </div>

         <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-left {{Request::is('home*')? 'active': ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>
                
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link text-left {{Request::is('users*')? 'active': ''}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('subjects.index') }}" class="nav-link text-left {{Request::is('subjects*')? 'active': ''}}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Subjects</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('school-years.index') }}" class="nav-link text-left {{Request::is('school-years*')? 'active': ''}}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>School Year</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('semester.index') }}" class="nav-link text-left {{Request::is('semester*')? 'active': ''}}">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>Semester</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('time.index') }}" class="nav-link text-left {{Request::is('time*')? 'active': ''}}">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>Time</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link text-left {{Request::is('courses*')? 'active': ''}}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Courses</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('department.index') }}" class="nav-link text-left {{Request::is('department*')? 'active': ''}}">
                            <i class="nav-icon fas fa-greater-than"></i>
                            <p>Department</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'teacher')
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link text-left {{Request::is('courses*')? 'active': ''}}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                @endif
                {{-- <li class="nav-item">
                    <a href="" class="nav-link text-left">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Archived Courses</p>
                    </a>
                </li> --}}                
                @if(auth()->user()->role != 'admin')
                    @php
                        if (auth()->user()->role == 'teacher') {
                            $courses = \DB::table('courses');
                            $courses = $courses->where('teacher_id',auth()->user()->id)->get();
                        } else {
                            $courses = \DB::table('courses');
                            $courses = $courses->join('course_students as cs','cs.course_id','courses.id')->where('cs.student_id',auth()->user()->id)->select('courses.id','courses.name')->get();
                        }
                    @endphp

                    @foreach($courses as $i => $data)
                        <li class="nav-item">
                            <a href="{{ route('course-students.course',$data->id) }}" class="nav-link text-left {{Request::is('course/'.$data->id.'/*')? 'active': ''}}">
                                <i class="nav-icon fas fa-greater-than"></i>
                                <p>{{ $data->name ?? 'N/a' }}</p>
                            </a>
                        </li>
                    @endforeach
                @endif
                
                @if(auth()->user()->role != 'admin')
                    <li class="nav-item">
                        <a href="{{ route('account') }}" class="nav-link text-left {{Request::is('settings*')? 'active': ''}}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Account Setting</p>
                        </a>
                    </li>
                @endif
                
                <li class="nav-item">
                    <a class="nav-link text-left" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
