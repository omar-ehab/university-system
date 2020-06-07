<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('dashboard.home') }}" class="site_title">
                <img src="{{asset('images/logo.png')}}" alt="pua logo" class="sideNav-logo">
                <span>PUA system</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('images/user.png') }}" alt="profile picture" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{ route('dashboard.home') }}"><i class="far fa-home-lg-alt"></i> Home</a></li>
                    @role('admin')
                    <li>
                        <a href="{{ route('dashboard.terms.index') }}">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Terms
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.faculties.index') }}">
                            <i class="far fa-university"></i>
                            Faculties
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.teachers.index') }}">
                            <i class="far fa-users"></i>
                            Teachers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.teacher-assistants.index') }}">
                            <i class="far fa-users"></i>
                            Teachers Assistants
                        </a>
                    </li>
                    <li><a href="{{ route('dashboard.students.index') }}">
                            <i class="far fa-users-class"></i>
                            Students
                        </a>
                    </li>
                    @endrole
                    @role('head_department')
                    <li>
                        <a href="{{ route('dashboard.department.courses', auth()->user()->headDepartment->department_id) }}">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            Department Courses
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.department.teachers', auth()->user()->headDepartment->department_id) }}">
                            <i class="far fa-users"></i>
                            Department Teachers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.department.teacherAssistants', auth()->user()->headDepartment->department_id) }}">
                            <i class="far fa-users"></i>
                            Department T.As
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.department.students', auth()->user()->headDepartment->department_id) }}">
                            <i class="far fa-users-class"></i>
                            Department Students
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.calender', auth()->user()->headDepartment->department_id) }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Department Calender
                        </a>
                    </li>
                    @endrole
                    @role('teacher')
                    <li>
                        <a href="{{ route('dashboard.teacher.my-courses', auth()->user()->teacher->id) }}">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            My Courses
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.teacher.alerts', auth()->user()->teacher->id) }}">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            Students Alerts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.teacher.calender', auth()->user()->teacher->id) }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Term Schedule
                        </a>
                    </li>
                    @endrole
                    @role('teacher_assistant')
                    <li>
                        <a href="{{ route('dashboard.teacher_assistants.courses', auth()->user()->teacherAssistant->id) }}">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            Courses
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.teacher_assistants.calender', auth()->user()->teacherAssistant->id) }}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Term Schedule
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
