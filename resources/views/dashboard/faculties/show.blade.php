@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $faculty->name }}</h2>
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
                                    <td>{{ $faculty->name }}</td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>{{ $faculty->code }}</td>
                                </tr>
                                <tr>
                                    <td>Faculty Dean</td>
                                    <td>{{ $faculty->dean->user->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td>Departments</td>
                                    <td>{{ $faculty->departments_count }}</td>
                                </tr>
                                <tr>
                                    <td>Students</td>
                                    <td>{{ $faculty->students_count }}</td>
                                </tr>
                                <tr>
                                    <td>Classrooms</td>
                                    <td>{{ $faculty->classrooms_count }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('dashboard.faculties.edit_head', $faculty->id) }}">
                                <button class="btn btn-primary"><i class="fa fa-edit"></i>
                                    Edit Faculty Dean
                                </button>
                            </a>
                            <a href="{{ route('dashboard.faculties.edit', $faculty->id) }}">
                                <button class="btn btn-warning"><i class="fa fa-edit"></i>
                                    Edit
                                </button>
                            </a>
                            <a href="{{ route('dashboard.faculties.departments.index', $faculty->id) }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    Departments
                                </button>
                            </a>
                            <a href="{{ route('dashboard.faculties.classrooms.index', $faculty->id) }}">
                                <button class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    Classrooms
                                </button>
                            </a>
                            <form action="{{ route('dashboard.faculties.destroy', $faculty->id) }}"
                                  method="post" style="display: inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete"><i
                                        class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

