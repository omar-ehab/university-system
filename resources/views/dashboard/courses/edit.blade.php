@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Course</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.courses.update', $course->id) }}">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{ auth()->user()->headDepartment->department_id }}"
                               name="department_id">
                        <div class="col-xs-12 form-group @error('name') bad @enderror">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" value="{{ $course->name }}">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-xs-12 form-group @error('code') bad @enderror">
                            <label for="code">Course Code</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code"
                                   value="{{ $course->code }}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('credit_hours') bad @enderror">
                            <label for="code">Course Credit Hours</label>
                            <input type="text" class="form-control" id="credit_hours" name="credit_hours"
                                   placeholder="Credit Hours"
                                   value="{{ $course->credit_hours }}">
                            @error('credit_hours')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @foreach($courses as $index => $pre_course)

                        @endforeach
                        <div class="col-xs-12 form-group @error('credit_hours') bad @enderror">
                            <label for="code">Course Prerequisites</label>
                            <select class="prerequisites form-control" name="prerequisites[]"
                                    multiple="multiple">
                                @foreach($courses as $pre_course)
                                    <option
                                        value="{{ $pre_course->id }}" {{ $course->prerequisites->contains($pre_course) ? 'selected' : '' }}>{{ $pre_course->name }}</option>
                                @endforeach
                            </select>
                            @error('credit_hours')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Course
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
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.prerequisites').select2();
        });
    </script>
@endpush
