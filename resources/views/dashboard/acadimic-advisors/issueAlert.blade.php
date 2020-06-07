@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Issue Alert</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.academic_advisor.issueAlert', [$advisor->id, $student->id]) }}">
                        @csrf

                        <div class="col-xs-12 form-group @error('course_id') bad @enderror">
                            <label for="course_id">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-bell"></i> Issue Alert
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
