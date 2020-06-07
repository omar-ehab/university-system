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

              @forelse ($student_course as $student_course)

                           @php
                           $term=$student_course->term;

                           // $term=App\Term::findOrFail($student_course->term_id);
                               
                           @endphp
                           
                           <a href="{{ route('dashboard.student.termTranscript',$term->id)}}">{{$term->name}}</a>

                               
                        @empty
                     
                            none
                        @endforelse
                         


{{-- @forelse ($student_course_term as $student_course_term)

@php
//ana kda m3aia korsat al student dah
$coursesssss=$student_course_term->course;
$term_id=$course->first()->pivot->term_id;
$term=App\Term::findOrFail($term_id);
@endphp

@foreach ($coursesssss as $course)

@php
    $term_id=$course->first()->pivot->term_id;
$term=App\Term::findOrFail($term_id);
@endphp
<h3> {{$term->name}} </h3>
@endforeach --}}
   
   

                
{{-- @php
 $count=0;


    //$term_asln=App\Term::where('id',$student_course_term->term_id);
@endphp    
 --}}

 
{{-- 
@empty
<P>No Transcript exists...</P>

                

   @endforelse --}}








            
            </div>
        </div>

        @include('layouts.dashboard._scripts')
@stack('scripts')
    </body>

</html>
