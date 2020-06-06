@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Assign Teacher Assistant</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.courses.assign_teacher_assistant', $course->id) }}">
                        @csrf

                        <div class="col-xs-12 form-group @error('term_id') bad @enderror">
                            <label for="term_id">Term</label>
                            <select name="term_id" id="term_id" class="form-control">
                                @foreach($terms as $term)
                                    <option value="{{ $term->id }}">{{ $term->name }}</option>
                                @endforeach
                            </select>
                            @error('term_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('teacher_assistant_ids') bad @enderror">
                            <label for="teacher_assistant_ids">Teacher Assistant</label>
                            <select name="teacher_assistant_ids[]" id="teacher_assistant_ids"
                                    class="form-control teacher_assistant_ids" multiple>
                                @foreach($teacherAssistants as $assistant)
                                    <option value="{{ $assistant->id }}">{{ $assistant->user->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_assistant_ids')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-xs-12 form-group @error('classroom_id') bad @enderror">
                            <label for="classroom_id">Classroom</label>
                            <select name="classroom_id" id="classroom_id" class="form-control">
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->code }}</option>
                                @endforeach
                            </select>
                            @error('classroom_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('day_number') bad @enderror">
                            <label for="classroom_id">Day</label>
                            <select name="day_number" id="day_number" class="form-control">
                                @foreach($weekDays as $index => $weekDay)
                                    <option value="{{ $index }}">{{ $weekDay }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xs-6 form-group @error('day_number') bad @enderror">
                            <label for="classroom_id">From</label>
                            <input type="time" id="from" name="from" class="form-control">
                        </div>

                        <div class="col-xs-6 form-group @error('day_number') bad @enderror">
                            <label for="classroom_id">To</label>
                            <input type="time" id="to" name="to" class="form-control">
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Assign Teacher
                                    Assistant
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
            $('.teacher_assistant_ids').select2();
        });
    </script>
@endpush
