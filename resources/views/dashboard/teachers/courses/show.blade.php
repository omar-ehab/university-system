@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $course->name }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 20%">#</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $course->name }}</td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>{{ $course->code }}</td>
                                </tr>
                                <tr>
                                    <td>Course Credit Hours</td>
                                    <td>{{ $course->credit_hours }}</td>
                                </tr>
                                <tr>
                                    <td>Students</td>
                                    <td>{{ $course->students_count }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('dashboard.teacher.courseStudents', [$teacher->id, $course->id]) }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    Show Registered Students
                                </button>
                            </a>
                            <a href="{{ route('dashboard.materials.index', $course->id) }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    Show Course Materials
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

