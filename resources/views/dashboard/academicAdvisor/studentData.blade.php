@extends('layouts.dashboard.app')
@section('content')
    <div style="padding-left: 20px">


        @php
            $studentuser=$student->user

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
                            <td>{{$studentuser->name}}</td>
                        </tr>


                        <tr>

                            <td>Student ID</td>
                            <td>{{$student->student_id}}</td>
                        </tr>


                        <tr>

                            <td>Student Nationality</td>
                            <td>{{$studentuser->nationality}}</td>
                        </tr>

                        <tr>

                            <td>Student Gender</td>
                            <td>{{$studentuser->gender}}</td>
                        </tr>


                        <tr>

                            <td>Student Religion</td>
                            <td>{{$studentuser->religion}}</td>
                        </tr>


                        <tr>

                            <td>Student Mobile</td>
                            <td>{{$studentuser->mobile}}</td>
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

        <div style="float: right ; padding-right:30px; margin-bottom:30px">
            <a href="{{ route('dashboard.academicAdvisor.issueAlert',$student->id)}}">
                <button class="btn btn-danger"> Issue Alert</button>

        </div>

    </div>
@endsection
