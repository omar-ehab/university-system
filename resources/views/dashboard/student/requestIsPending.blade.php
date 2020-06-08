@extends('layouts.dashboard.app')
@section('contant')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            {{-- class="col-md-9" --}}
            <div style="padding: 10px;">

                @php
                    $count=0;
                @endphp


                <div class="col-md-6 col-sm-6 " style="width: 100%">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Course is Added successfully </h2>
                            <br>
                            <div class="clearfix"></div>
                            <p style="color:rgb(120, 141, 151)">You're request is pending !</p>
                        </div>
                        <div class="x_content">

                            <p style="font-size: 20px">You have successfully added this course, please check with your
                                academic advisor for further information !</p>
                            <a href="{{ route('dashboard.student.registerCourses') }}">
                                <button class="btn btn-dark" style="float: right">Go back</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
