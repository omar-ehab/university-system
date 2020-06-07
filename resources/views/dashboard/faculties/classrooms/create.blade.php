@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add new Classroom</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.faculties.classrooms.store', $faculty->id) }}">
                        @csrf
                        <div class="col-xs-12 form-group @error('code') bad @enderror">
                            <label for="code">Classroom Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                   placeholder="Code" value="{{ old('code') }}">

                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('capacity') bad @enderror">
                            <label for="capacity">Classroom Capacity</label>
                            <input type="number" min="5" class="form-control" id="capacity" name="capacity"
                                   placeholder="Capacity"
                                   value="{{ old('capacity') }}">
                            @error('capacity')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('floor') bad @enderror">
                            <label for="floor">Floor</label>
                            <input type="number" min="5" class="form-control" id="floor" name="floor"
                                   placeholder="Floor"
                                   value="{{ old('floor') }}">
                            @error('floor')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Classroom
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