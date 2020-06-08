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

              @forelse ($data as $index => $term)

                        
                           
                           {{-- <a href="{{ route('dashboard.student.termTranscript',$term->id)}}">{{$term->name}}</a> --}}
                    <p>{{ $index }}</p>
                    <div class="x_content">
                        <table class="table table-hover table-bordered">
                                                           <thead>
                                                           <tr>
                                                           <th style="text-align: center">#</th>
                                                           <th style="text-align: center">course Name</th>
                                                           <th style="text-align: center">course Code</th>
                                                            <th style="text-align: center">course Credit Hours</th>
                                                            <th style="text-align: center">course GPA</th>
                       
                                                           </tr>
                                                            </thead>
                       
                       
                                               @php
                                               $count=0;
                       
                                               @endphp
                       
                       
                                     @forelse ($term as $course)
                       
                                        
                                       <tbody>
                       
                                            <tr>
                                                {{-- {{ dd($c->name) }} --}}
                                               <th scope="row">{{ $count }}</th>
                                               <td> {{ $course->name }} </td>
                                               <td>{{ $course->code }}</td>
                                               <td>{{ $course->credit_hours }}</td>
                                               <td>{{$course->cgpa}}</td>
                                            </tr>
                       
                                               @empty
                                            
                                               none
                                           @endforelse
                               
                       
                           
                                       </tbody>
                                   </table>
                                  
                       </div>
                               
                @empty
                    
                    none
                @endforelse
                         




                <div class="button">
                    <i class="fa fa-print" style="float:right;padding-right:25px " onclick="window.print()"></i>

                   </div>






            
            </div>
        </div>

        <script>
            setTimeout(function(){
                window.print();
            }, 500);
            
        </script>
        <style>
            @media print{
                .button{
                    display: none;
                }
            }
            
        </style>
    </body>

</html>
