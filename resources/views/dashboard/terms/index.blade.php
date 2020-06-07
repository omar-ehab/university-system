@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-clock-o" aria-hidden="true"></i> Terms

                </h2>
                <div class="clearfix"></div>
                <a href="{{ route('dashboard.terms.create') }}">
                    <button class="btn btn-primary "><i class="fa fa-plus"></i> Add New</button>
                </a>
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
                                        Starts At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Code: activate to sort column ascending">
                                        Ends At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Code: activate to sort column ascending">
                                        Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Code: activate to sort column ascending">
                                        Registration Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                        aria-label="Control: activate to sort column ascending">Control
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($terms as $index => $term)
                                    <tr role="row" class="odd">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $term->name }}</td>
                                        <td>{{ $term->start }}</td>
                                        <td>{{ $term->end }}</td>
                                        <td>
                                            @if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($term->end))
                                                <span class="term-status term-danger">Term Ended</span>
                                            @elseif(\Carbon\Carbon::now() >= \Carbon\Carbon::parse($term->start) && \Carbon\Carbon::now() <= \Carbon\Carbon::parse($term->end))
                                                <span class="term-status term-primary">Term Working</span>
                                            @elseif(\Carbon\Carbon::now() < \Carbon\Carbon::parse($term->start))
                                                <span class="term-status term-warning">Term not started yet</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($term->can_register)
                                                <span class="term-status term-primary">Registration Opened</span>
                                            @else
                                                <span class="term-status term-danger">Registration Closed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($term->can_register)
                                                <a href="{{ route('dashboard.terms.close_registration', $term->id) }}">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Close Registration
                                                    </button>
                                                </a>
                                            @else
                                                <a href="{{ route('dashboard.terms.open_registration', $term->id) }}">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Open Registration
                                                    </button>
                                                </a>
                                            @endif

                                            <a href="{{ route('dashboard.terms.edit', $term->id) }}">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            <form action="{{ route('dashboard.terms.destroy', $term->id) }}"
                                                  method="post" style="display: inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
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

