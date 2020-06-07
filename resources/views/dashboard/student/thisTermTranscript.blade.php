<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>Transcript</title>

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
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
            }

            /* .full-height {
                height: 100vh;
            } */

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       
            <div class="content">

                <div class="x_panel">
                    <div class="x_title">
                    <h2>My Transcript</h2>
                    <br>
                    <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                         
                               
 <div class="x_panel">
     <div class="row">
     <div class="col-md-2 col-sm-4" style="float: right">
    <img src="{{asset('images/logo.png')}}" alt="pua logo" style="width: 60px;height:60px;float:center">
    <br><br>
    <p style="float:center;">Pharos University In Alexandria</p>
    <br><br><br><br>

</div>

<div class="col-md-2 col-sm-4" style="float: left">
    <br><br>
    <table style="width:100%">
    <tr>
        <td><p>Name :</p></td>
        <td><p>{{Auth::user()->name}}</p></td>
    </tr>
    <tr><td><p>ID :</p></td>
        <td><p>{{Auth::user()->student->student_id}}</p></td>
        </tr>

    <tr><td><p>Birth Date :</p></td>    
    <td><p>{{Auth::user()->birth_date}}</p></td>
    </tr>

    <tr><td><p>Faculty :</p></td>    
        <td><p>{{Auth::user()->student->department->faculty->name}}</p></td>
        </tr>

        <tr><td><p>Department :</p></td>    
            <td><p>{{Auth::user()->student->department->name}}</p></td>
            </tr>

    

    </table>

    <br><br><br><br>

</div>

</div>

<div>
</div>
    <div class="x_content">


 <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>course Name</th>
                                    <th>course Code</th>
 				                    <th>course Credit Hours</th>
 				                    <th>course GPA</th>

                                    </tr>
                                     </thead>


                        @php
                        $count=0;

                        @endphp


              @forelse ($student_term_courses as $student_term_courses)

                    @php
                    $student=Auth::user()->student;
                    $cgpa=$student->course->first()->pivot->cgpa;
                    $course=$student_term_courses->course;
                        // $student_course=$course->course_student;
                        $count=$count+1;
                        //dd($student_course);
                        //$cgpa=$student_course->first()->pivot->cgpa;
                        
                        @endphp

                <tbody>

                                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td> {{$course->name}} </td>
                        <td>{{$course->code}}</td>
                        <td>{{$course->credit_hours}}</td>
                        <td>{{$cgpa}}</td>
                        </tr>

                        @empty
                     
                        none
                    @endforelse
        

    
                </tbody>
            </table>
</div>
</div>
                           
                            
            
            </div>
        </div>

        @include('layouts.dashboard._scripts')
@stack('scripts')
    </body>
                        <i class="fa fa-print" style="float:right;padding-right:25px " onclick="window.print()"></i>

</html>
