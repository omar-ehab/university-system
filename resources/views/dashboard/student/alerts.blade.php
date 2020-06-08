@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>My Alerts</h2>
                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">you can view all alerts in courses</p>
                </div>
                <div class="x_content">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Published Date</th>
                            <th>View Alert</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($alert as $alert)

                            @if ($alert->isApproved)
                                @php

                                    $count=$count+1;
                                    $alertcourse=$alert->course;

                                @endphp


                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td> {{$alertcourse->name}} </td>
                                    <td>{{$alertcourse->code}}</td>
                                    <td>{{$alert->publish_date}}</td>

                                    <td><a href="{{ route('dashboard.student.alertData',$alert->id) }}">
                                            <button type="button" class="btn btn-danger" style="border-style: none">View
                                            </button>
                                        </a></td>
                                </tr>

                            @endif

                        @empty
                            <P>No Alerts for you ...</P>

                        @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
