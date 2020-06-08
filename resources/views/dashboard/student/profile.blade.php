@extends('layouts.dashboard.app')
@section('content')
    <div class="row x_title">
        <div class="col-md-3">
            <h3>My Profile</h3>
        </div>
    </div>
    <div style="padding-left: 20px">


        @php
            $studentuser=Auth::user();
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$studentuser->name}}'s data </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover table-bordered" style="font-size:15px">
                        <thead style="font-size:16px ">
                        <tr>
                            <th style="width: 20%">Data field</th>
                            <th>Record</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>

                            <td>Student Name</td>
                            <td>{{Auth::user()->name}}</td>
                        </tr>


                        <tr>

                            <td>Student ID</td>
                            <td>{{$student->id}}</td>
                        </tr>


                        <tr>

                            <td>Student Nationality</td>
                            <td>{{Auth::user()->nationality}}</td>
                        </tr>

                        <tr>

                            <td>Student Gender</td>
                            <td>{{Auth::user()->gender}}</td>
                        </tr>


                        <tr>

                            <td>Student Religion</td>
                            <td>{{Auth::user()->religion}}</td>
                        </tr>


                        <tr>

                            <td>Student Mobile</td>
                            <td>{{Auth::user()->mobile}}</td>
                        </tr>

                        <tr>

                            <td>Student GPA</td>
                            <td>{{$student->cgpa}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection


