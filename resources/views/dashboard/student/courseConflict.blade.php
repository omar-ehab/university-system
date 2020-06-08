@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Erorr </h2>
                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">Erorr while registering this course !</p>
                </div>
                <div class="x_content">

                    <p style="font-size: 20px">The course you are trying to register requiers prerequisites , please
                        check with your academic advisor !</p>
                    <a href="{{ route('dashboard.student.registerCourses') }}">
                        <button class="btn btn-dark" style="float: right">Go back</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
