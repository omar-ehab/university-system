@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Teacher Assistant</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.teacher-assistants.update', $teacherAssistants->id) }}">
                        @csrf
                        @method('put')

                        <div class="col-xs-12 form-group">
                            <label for="faculty">Faculty</label>
                            <select name="faculty_id" id="faculty" class="form-control @error('faculty') bad @enderror">
                                @foreach($faculties as $faculty)
                                    <option
                                        value="{{ $faculty->id }}" {{ $teacherAssistants->department->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                            @error('faculty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="department">Department</label>
                            <select name="department_id" id="department"
                                    class="form-control @error('department') bad @enderror">
                                @foreach(\App\Faculty::where('id', $teacherAssistants->department->faculty_id)->first()->departments as $department)
                                    <option
                                        value="{{ $department->id }}" {{ $teacherAssistants->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('name') bad @enderror">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" value="{{ $teacherAssistants->user->name }}">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('email') bad @enderror">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                                   value="{{ $teacherAssistants->user->email }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('mobile') bad @enderror">
                            <label for="name">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                   placeholder="Mobile" value="{{ $teacherAssistants->user->mobile }}">

                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') bad @enderror">
                                <option value="male" {{ $teacherAssistants->user->gender == 'male' ? 'selected' : '' }}>
                                    Male
                                </option>
                                <option
                                    value="female" {{ $teacherAssistants->user->gender == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>
                            @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="nationality">Nationality</label>
                            <select name="nationality" id="nationality"
                                    class="form-control @error('nationality') bad @enderror">
                                <option
                                    value="egyptian" {{ $teacherAssistants->user->nationality == 'egyptian' ? 'selected' : '' }}>
                                    Egyptian
                                </option>
                                <option
                                    value="other" {{ $teacherAssistants->user->nationality == 'other' ? 'selected' : '' }}>
                                    Other...
                                </option>
                            </select>
                            @error('nationality')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 xdisplay_inputx form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" class="form-control @error('birth_date') bad @enderror" name="birth_date"
                                   id="birth_date"
                                   aria-describedby="birth_date" value="{{ $teacherAssistants->user->birth_date }}">
                            @error('birth_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="national_id">National Id</label>
                            <input type="text" pattern="\d*" minlength="14" maxlength="14"
                                   class="form-control @error('national_id') bad @enderror"
                                   name="national_id"
                                   id="national_id" autocomplete="off" placeholder="National ID"
                                   value="{{ $teacherAssistants->user->national_id }}">
                            @error('national_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="religion">Religion</label>
                            <select name="religion" id="religion" class="form-control @error('religion') bad @enderror">
                                <option
                                    value="muslim" {{ $teacherAssistants->user->religion == 'muslim' ? 'selected' : '' }}>
                                    Muslim
                                </option>
                                <option
                                    value="christian" {{ $teacherAssistants->user->religion == 'christian' ? 'selected' : '' }}>
                                    Christian
                                </option>
                                <option
                                    value="other" {{ $teacherAssistants->user->religion == 'other' ? 'selected' : '' }}>
                                    Other...
                                </option>
                            </select>
                            @error('religion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                    Edit Head Department
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
    <script>
        $('#faculty').on('change', function () {
            let selectedFaculty = $(this).children("option:selected").val();
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.get_departments_ajax') }}",
                data: {
                    'faculty_id': selectedFaculty
                },
                cache: false,
                success: function (data) {
                    $('#department').empty();
                    $.each(data, function (key, value) {
                        $('#department').append(`
                            <option value="${value.id}">${value.name}</option>
                        `);
                    })
                }
            });
        });
    </script>
@endpush

