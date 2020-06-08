@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Faculty Professors</h2>

                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">Here you can view all professors in each faculty</p>

                </div>

                @forelse ($faculty_departments as $faculty_department)



                    @php
                        $count=0;


                           $professors=$faculty_department->teachers;

                    @endphp
                    <div class="x_panel" style="background-color: #FAFAFA">

                        <div class="x_content">


                            <h3> {{$faculty_department->name}} </h3>


                            {{-- @if($professors) --}}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Professor Name</th>
                                    <th>view Professor</th>

                                </tr>
                                </thead>

                                {{-- @endif --}}
                                <tbody>


                                @forelse ($professors as $professor)
                                    @php
                                        $count=$count+1;
                                        $professors_user=$professor->user;

                                    @endphp
                                    <tr>
                                        <td>{{$count}}</td>

                                        <td>{{$professors_user->name}}</td>
                                        <td>
                                            <a href="{{ route('dashboard.headUniversity.viewThisProfessor',$professor->id) }}">
                                                <button type="button" class="btn btn-dark" style="border-style: none">
                                                    View
                                                </button>
                                            </a>
                                    </tr>

                                @empty
                                    {{-- <P>No professors exists...</P> --}}

                                @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>



                @empty
                    <P>No Department exists...</P>

                @endforelse

            </div>

        </div>


    </div>
@endsection
