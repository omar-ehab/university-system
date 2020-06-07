@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $department->name }}</h2>
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
                                    <td>{{ $department->name }}</td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>{{ $department->code }}</td>
                                </tr>
                                <tr>
                                    <td>Floor</td>
                                    <td>{{ $department->floor }}</td>
                                </tr>
                                <tr>
                                    <td>Department Head</td>
                                    <td>{{ $department->head->user->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td>Courses Count</td>
                                    <td>{{ $department->courses_count }}</td>
                                </tr>
                                <tr>
                                    <td>Teachers Count</td>
                                    <td>{{ $department->teachers_count }}</td>
                                </tr>
                                <tr>
                                    <td>Teacher Assistants Count</td>
                                    <td>{{ $department->teacher_assistants_count }}</td>
                                </tr>
                                <tr>
                                    <td>Academic Advisors Count</td>
                                    <td>{{ $department->academic_advisors_count }}</td>
                                </tr>
                                <tr>
                                    <td>Students Count</td>
                                    <td>{{ $department->students_count }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('dashboard.faculties.departments.edit_head', [$faculty_id, $department->id]) }}">
                                <button class="btn btn-primary"><i class="fa fa-edit"></i>
                                    Edit Department Head
                                </button>
                            </a>
                            <a href="{{ route('dashboard.faculties.departments.edit', [$faculty_id, $department->id]) }}">
                                <button class="btn btn-warning"><i class="fa fa-edit"></i>
                                    Edit
                                </button>
                            </a>
                            <form
                                action="{{ route('dashboard.faculties.departments.destroy', [$faculty_id, $department->id]) }}"
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


