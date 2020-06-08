@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">

        @php
            $count=0;
        @endphp


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="row x_title" style="border-bottom:none">
                    <div class="col-md-6">
                        <h3>Your Alert</h3>
                    </div>
                    <div class="col-md-6" style="width: 20%;float: right;">
                        <div style="background: #fff;padding: 5px 10px; border: 1px solid #ccc">
                            <i class=" glyphicon-calendar fa fa-calendar"></i>
                            <span>{{$alert->publish_date}}</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="x_panel">

                <p>{{$alert->body}}</p>


            </div>

            <a href="{{ route('dashboard.student.alerts',Auth::user()->id) }}">
                <button type="button" class="btn btn-success" style="border-style: none;float:right"> Ok
                </button>
            </a>

        </div>

    </div>
@endsection

