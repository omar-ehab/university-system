@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-file" aria-hidden="true"></i> Materials

                </h2>
                <div class="clearfix"></div>
                @role(['teacher', 'teacher_assistant'])
                <a href="{{ route('dashboard.materials.create', $course->id) }}">
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
                                        colspan="1" aria-sort="ascending" style="width: 50px">#
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 263px;">
                                        Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Students Count: activate to sort column ascending"
                                        style="width: 150px;">
                                        Uploaded At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Control: activate to sort column ascending">Control
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materials as $index => $material)
                                    <tr role="row" class="odd">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if(pathinfo($material->name, PATHINFO_EXTENSION) == 'docx' || pathinfo($material->name, PATHINFO_EXTENSION) == 'doc')
                                                <i class="fa fa-file-word-o" aria-hidden="true"></i>
                                            @elseif(pathinfo($material->name, PATHINFO_EXTENSION) == 'xls' || pathinfo($material->name, PATHINFO_EXTENSION) == 'xlsx')
                                                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                            @elseif(pathinfo($material->name, PATHINFO_EXTENSION) == 'ppt' || pathinfo($material->name, PATHINFO_EXTENSION) == 'pptx')
                                                <i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>
                                            @elseif(pathinfo($material->name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($material->name, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($material->name, PATHINFO_EXTENSION) == 'png')
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            @elseif(pathinfo($material->name, PATHINFO_EXTENSION) == 'pdf')
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                            @endif
                                            {{ $material->name }}
                                        </td>
                                        <td>{{ $material->created_at->format('Y/m/d H:i A') }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.materials.download', [$course->id, $material->id]) }}">
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                    Download
                                                </button>
                                            </a>
                                            @role(['teacher', 'teacher_assistant'])
                                            @if(auth()->user()->id == $material->user_id)
                                                <form
                                                    action="{{ route('dashboard.materials.destroy', [$course->id, $material->id]) }}"
                                                    method="post" style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn btn-danger disabled">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    Delete
                                                </button>
                                            @endif
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

