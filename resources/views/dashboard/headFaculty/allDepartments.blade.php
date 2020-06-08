@extends('layouts.dashboard.app')
@section('content')
    <div style="padding: 10px;">
        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>My faculty Departments</h2>
                    <br>
                    <div class="clearfix"></div>
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
                                            Department Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1"
                                            aria-label="Code: activate to sort column ascending" style="width: 50px;">
                                            Department Code
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1"
                                            aria-label="Code: activate to sort column ascending" style="width: 250px;">
                                            Department Floor
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($departments as $index => $department)
                                        <tr role="row" class="odd">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->code }}</td>
                                            <td>{{ $department->floor }}</td>
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
    </div>
@endsection
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
