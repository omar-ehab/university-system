@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Change Faculty Dean</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.faculties.update_head', $faculty_id) }}">
                        @csrf
                        @method('put')
                        <div class="col-xs-12 form-group">
                            <label for="dean">Faculty Dean</label>
                            <select name="dean_id" id="dean" class="form-control">
                                @foreach($deans as $dean)
                                    <option
                                        value="{{ $dean->id }}" {{ $dean->id == $oldDean->user->id ? 'selected' : '' }}>{{ $dean->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Change Dean
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
