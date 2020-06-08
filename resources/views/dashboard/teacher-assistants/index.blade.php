@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="far fa-users" aria-hidden="true"></i> Teachers Assistants

                </h2>
                <div class="clearfix"></div>
                @role('admin')
                <a href="{{ route('dashboard.teacher-assistants.create') }}">
                    <button class="btn btn-primary "><i class="fa fa-plus"></i> Add New</button>
                </a>
                @endrole
            </div>
            <div class="x_content">
                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="faculties"
                                   class="table table-striped table-bordered dataTable no-footer table-responsive"
                                   role="grid" aria-describedby="datatable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" aria-sort="ascending">#
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Code: activate to sort column ascending">
                                        Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Code: activate to sort column ascending">
                                        Mobile
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Departments Count: activate to sort column ascending">
                                        Faculty
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Departments Count: activate to sort column ascending">
                                        Department
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Classrooms Count: activate to sort column ascending">
                                        Gender
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Students Count: activate to sort column ascending">
                                        Nationality
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Students Count: activate to sort column ascending">
                                        Birth date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Students Count: activate to sort column ascending">
                                        National Id
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Students Count: activate to sort column ascending">
                                        Religion
                                    </th>
                                    @role(['admin', 'head_department'])
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Control: activate to sort column ascending">Control
                                    </th>
                                    @endrole
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teacherAssistants as $index => $assistant)

                                    <tr role="row" class="odd">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $assistant->name }}</td>
                                        <td><a href="mailto:{{ $assistant->email }}"
                                               style="text-decoration: underline">{{ $assistant->email }}</a></td>
                                        <td>{{ $assistant->mobile }}</td>
                                        <td>{{ $assistant->teacherAssistant->department->faculty->name }}</td>
                                        <td>{{ $assistant->teacherAssistant->department->name }}</td>
                                        <td>{{ ucfirst($assistant->gender) }}</td>
                                        <td>{{ ucfirst($assistant->nationality) }}</td>
                                        <td>{{ $assistant->birth_date }}</td>
                                        <td>{{ $assistant->national_id }}</td>
                                        <td>{{ ucfirst($assistant->religion) }}</td>

                                        <td>
                                            @role('head_department')
                                            @if(!\App\AcademicAdvisor::where('user_id', $assistant->id)->where('department_id', $assistant->teacherAssistant->department_id)->first())
                                                <a href="{{ route('dashboard.teacher-assistants.makeAcademicAdvisor', $assistant->teacherAssistant->id) }}">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Make as an Academic Advisor
                                                    </button>
                                                </a>
                                            @else
                                                <a href="{{ route('dashboard.teacher-assistants.assignStudents', $assistant->academicAdvisor->id) }}">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-users"></i>
                                                        Assign Students
                                                    </button>
                                                </a>
                                            @endif
                                            @endrole
                                            @role('admin')
                                            <a href="{{ route('dashboard.teacher-assistants.edit', $assistant->teacherAssistant->id) }}">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            <form
                                                action="{{ route('dashboard.teacher-assistants.destroy', $assistant->teacherAssistant->id) }}"
                                                method="post" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                            @endrole
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script>
        $('#faculties').DataTable({
            dom: "Blfrtip",
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: "csv",
                    className: "btn-sm",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: "print",
                    className: "btn-sm",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
            ],
            responsive: true
        })
    </script>
@endpush

