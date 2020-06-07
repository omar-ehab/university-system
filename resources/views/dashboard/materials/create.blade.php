@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Material</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.materials.store', $course) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-xs-12 form-group">
                            <label for="file">File
                                <span style="font-size: 12px;display: block">max file size is 2Mb</span>
                            </label>
                            <input type="file" name="file" id="file" class="form-control @error('file') bad @enderror">
                            <span style="display: block">avalable file types (pdf,doc,ppt,xls,docx,pptx,xlsx,jpg,jpeg,png)</span>
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    Upload Material
                                </button>
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
        $('#department').on('change', function () {
            let selectedDepartment = $(this).children("option:selected").val();
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.get_advisors_by_department_ajax') }}",
                data: {
                    'department_id': selectedDepartment
                },
                cache: false,
                success: function (data) {
                    $('#academic_advisor_id').empty();
                    $.each(data, function (key, value) {
                        $('#academic_advisor_id').append(`
                            <option value="${value.id}">${value.name}</option>
                        `);
                    })
                }
            });
        });
    </script>
@endpush

