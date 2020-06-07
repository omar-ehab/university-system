@extends('layouts.dashboard.app')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100vh;">
        <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon" style="margin-right: 10px">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="count">{{ $coursesCount }}</div>
                    <h3>Courses</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon" style="margin-right: 10px">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="count">{{ $studentsCount }}</div>
                    <h3>Students</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon" style="margin-right: 10px">
                        <i class="fa fa-bell"></i>
                    </div>
                    <div class="count">{{ $alertsCount }}</div>
                    <h3>Alerts</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="count">{{ $materialsCount }}</div>
                    <h3>Materials</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Students CGPA Chart</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="cgpa_chart" width="802" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
