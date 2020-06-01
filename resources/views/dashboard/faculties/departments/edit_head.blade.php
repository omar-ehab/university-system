@extends('layouts.dashboard.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Change Department Head</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left input_mask" method="post"
                          action="{{ route('dashboard.faculties.departments.update_head', [$faculty, $department->id]) }}">
                        @csrf
                        @method('put')
                        <div class="col-xs-12 form-group @error('head_id') bad @enderror">
                            <label for="head">Head Department</label>
                            <select name="head_id" id="head" class="form-control">
                                @foreach($users as $user)
                                    <option
                                        value="{{ $user->id }}" {{ $oldHead && $user->id == $oldHead->user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('head_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Change Head
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
