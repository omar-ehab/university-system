@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Department</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.faculties.departments.update', [$faculty_id, $department->id]) }}">
                        @csrf
                        @method('put')
                        <div class="col-xs-12 form-group @error('name') bad @enderror">
                            <label for="name">Department Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" value="{{ $department->name }}">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-xs-12 form-group @error('code') bad @enderror">
                            <label for="code">Department Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code"
                                   value="{{ $department->code }}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('floor') bad @enderror">
                            <label for="floor">Department Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" placeholder="Floor"
                                   value="{{ $department->floor }}">
                            @error('floor')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Department
                                </button>
                                {{--                                <button class="btn btn-primary btn-sm" type="reset">Clear inputs</button>--}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


