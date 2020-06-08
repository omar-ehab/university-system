@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>My Courses</h2>
                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">you can view each course material</p>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Material</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($collection as $course)


                            @php

                                $count=$count+1;

                            @endphp


                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td> {{$course->name}} </td>
                                <td>{{$course->code}}</td>
                                <td><a href="{{ route('dashboard.student.showCourseMaterial',$course->id) }}">
                                        <button type="button" class="btn btn-dark" style="border-style: none">View
                                        </button>
                                    </a></td>
                            </tr>

                        @empty
                            <P>No Courses yet ...</P>

                        @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
