@extends('layouts.dashboard.app')
@section('content')

    @php
        $count=0;
    @endphp


    <div class="col-md-6 col-sm-6 " style="width: 100%">
        <div class="x_panel">
            <div class="x_title">
                <h2>Students with pending Requests </h2>
                <br>
                <div class="clearfix"></div>
                <p style="color:rgb(120, 141, 151)">you can view each each student's request and approve or decline
                    them</p>
            </div>
            <div class="x_content">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($students as $student)

                        <p>

                            @php
                                $studentuser = $student->user;
                                $count=$count+1;

                            @endphp


                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td> {{$studentuser->name}} </td>
                                <td>{{$student->student_id}}</td>
                                <td>
                                    <a href="{{ route('dashboard.academicAdvisor.studentPendingRequests',$studentuser->id) }}">
                        <span class="glyphicon glyphicon-eye-open
                        " aria-hidden="true"></span></a></td>
                            </tr>

                    @empty
                        <P>No pending requests for you..</P>

                    @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
