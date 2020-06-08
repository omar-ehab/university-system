@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Faculties Professors</h2>

                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">Here you can view all professors in each faculty</p>

                </div>
                <div class="x_content">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Faculty Name</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($faculties as $faculty)

                            <p>

                                @php

                                    //    $dean=App\HeadFaculty::where('faculty_id',$faculty->id);
                                    //     $deanuser=$dean->user;
                                         $count=$count+1;

                                @endphp


                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td> {{$faculty->name}} </td>
                                    <td>
                                        <a href="{{ route('dashboard.headUniversity.thisFacultyProfessors',$faculty->id) }}">
                                            <button type="button" class="btn btn-dark" style="border-style: none">View
                                            </button>
                                        </a>
                                    </td>
                                    {{-- <td>{{$deanuser->name}}</td> --}}

                                </tr>

                        @empty
                            <P>No Faculties exists...</P>

                        @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
