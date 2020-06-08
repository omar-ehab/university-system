@extends('layouts.dashboard.app')
@section('content')
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
                                <a href="{{ route('dashboard.academicAdvisor.declinePendingRequest',$pendingRequest->id)}}">
                                    <button class="btn btn-danger"> Decline</button>


                                    <a href="{{ route('dashboard.academicAdvisor.acceptPendingRequest',$pendingRequest->id)}}">
                                        <button class="btn btn-success"> Accept</button>

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
@endsection
