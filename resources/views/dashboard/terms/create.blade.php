@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add new Term</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.terms.store') }}">
                        @csrf
                        <div class="col-xs-12 form-group @error('name') bad @enderror">
                            <label for="name">Term Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Name" value="{{ old('name') }}">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-xs-12 form-group @error('start') bad @enderror">
                            <label for="code">Term Starts At</label>
                            <input type="date" class="form-control" id="start" name="start"
                                   value="{{ old('start') }}">
                            @error('start')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xs-12 form-group @error('end') bad @enderror">
                            <label for="code">Term Ends At</label>
                            <input type="date" class="form-control" id="end" name="end"
                                   value="{{ old('end') }}">
                            @error('end')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Term
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
