@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Material</h2>
                    <br>
                    <div class="clearfix"></div>
                    <p style="color:rgb(120, 141, 151)">you can view each material and download it</p>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Material Name</th>
                            <th>Date</th>
                            <th>Download Material</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($material as $material)


                            @php

                                $count=$count+1;

                            @endphp


                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td> {{$material->name}} </td>
                                <td>{{$material->created_at}}</td>
                                <td><a href="#">
                                        <button type="button" class="btn btn-dark" style="border-style: none">Download
                                        </button>
                                    </a></td>
                            </tr>

                        @empty
                            <P>No Materials yet ...</P>

                        @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
