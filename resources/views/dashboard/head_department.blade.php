@extends('layouts.dashboard.app')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100vh;">
        <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon" style="margin-right: 10px">
                        <i class="fa fa-book"></i>
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
                    <div class="count">{{ $teachersCount }}</div>
                    <h3>Professor</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                <div class="tile-stats">
                    <div class="icon" style="margin-right: 10px">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="count">{{ $teacherAssistantCount }}</div>
                    <h3>Teacher Assistant</h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6">
                <div class="tile-stats">
                    <div class="icon">
                        <i class="far fa-university"></i>
                    </div>
                    <div class="count">{{ $studentsCount }}</div>
                    <h3>Student</h3>
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
        var ctx = document.getElementById('cgpa_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'CGPA > 3.5',
                    '3.0 < CGPA < 3.5',
                    '2.0 < CGPA < 3.0',
                    'CGPA < 2.0'
                ],
                datasets: [{
                    data: {!! $chart !!},
                    backgroundColor: [
                        '#5cb85c',
                        '#5bc0de',
                        '#f0ad4e',
                        '#d9534f',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endpush


