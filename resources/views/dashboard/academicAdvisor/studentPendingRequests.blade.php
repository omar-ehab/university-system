<!DOCTYPE html>
<html lang="en">
<!-- head navigation -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"/>


    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Font Awesome Pro -->
    <script src="{{ asset('js/font-awsome.min.js') }}"></script>

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Noty css -->
    <link href="{{ asset('vendors/noty/noty.css') }}" rel="stylesheet">
</head>
<title>@yield('title')</title>
@stack('styles')
<!-- /head navigation -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- side navigation -->
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><img src="{{asset('images/logo.png')}}" alt="pua logo" class="sideNav-logo">
                        <span>PUA system</span></a>
                </div>
        
                <div class="clearfix"></div>
        
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ asset('images/user.png') }}" alt="profile picture" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
        
                <br/>
        
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li>
                                <a href="{{ route('dashboard.academicAdvisor.index') }}">
        
                                    <i class="far fa-home-lg-alt"></i> Home</a></li>
                            <li>
                                {{-- {{$userid=Auth::user()->id}} --}}
                                <a href="{{ route('dashboard.academicAdvisor.profile',Auth::user()->id) }}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    &nbsp&nbspMy Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.academicAdvisor.myStudents',Auth::user()->id) }}">
                                    <i class="far fa-users"></i>
                                    My Students
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.academicAdvisor.allPendingRequests') }}">
                                    <i class="glyphicon glyphicon-inbox"></i>
                                    &nbsp&nbspPending requests
                                </a>
                            </li>
                          
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
        
    <!-- /side navigation -->

        <!-- top navigation -->
    <div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/user.png') }}" alt="">{{Auth::user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            
                @php
                $count=0;
                    @endphp


<div class="col-md-6 col-sm-6 " style="width: 80%">
<div class="x_panel">
<div class="x_title">
<h2>Student pending courses </h2>
<br>
<div class="clearfix"></div>
<p style="color:rgb(120, 141, 151)">you can accept or decline a request</p>
</div>
<div class="x_content">
<table class="table table-hover">
<thead>
<tr>
<th>#</th>
<th>Student Name</th>
<th>Student ID</th>
<th></th>

</tr>
 </thead>
<tbody>


@forelse ($pendingRequests as $pendingRequest)
                
            @php
            
            $course=$pendingRequest->course;
$count=$count+1;
        @endphp

                     
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td> {{$course->name}} </td>
                            <td>{{$course->code}} </td>
                            <td>
<a href="{{ route('dashboard.academicAdvisor.declinePendingRequest',$pendingRequest->id)}}"><button class="btn btn-danger"> Decline </button>

           
<a href="{{ route('dashboard.academicAdvisor.acceptPendingRequest',$pendingRequest->id)}}"><button class="btn btn-success"> Accept </button>

</td>
                            </tr>
                                       
                                     @empty
                                     <P>No pending requests for you..</P>
                
                            @endforelse 

                            

</tbody>
</table>
</div>
</div>
</div>
           
        </div>
        <!-- /page content -->

        <!-- footer content -->
    <footer>
    <div class="pull-right">
        <b>&copy; Faculty of Engineering Computer Department &copy;</b>
    </div>
    <div class="clearfix"></div>
</footer>
    <!-- /footer content -->
    </div>
</div>

<!-- scripts content -->
@include('layouts.dashboard._scripts')
@stack('scripts')
<!-- /scripts content -->
<!-- session messages -->
@include('partials._session')
<!-- /session messages -->
</body>
</html>

