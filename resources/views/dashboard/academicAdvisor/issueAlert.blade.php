@extends('layouts.dashboard.app')
@section('content')

    @php
        $studentuser=$student->user

    @endphp
    <div class="row x_title">
        <div class="col-md-3">
            <h3>Issue Alert to {{$studentuser->name}}</h3>
            {{-- <h3>Issue Alert to {{$student->id}}</h3> --}}
        </div>
    </div>


    <div style="padding-left: 20px">


        <br>

        {{-- view a student courses list  --}}

        <form action="{{route('dashboard.academicAdvisor.storeAlert',$student->id)}}" method="POST">

            @csrf
            <div class="field">

                <label class="lable" for="body">Alert Body</label>
                <div class="control">
                <textarea style="width: 60%; height:300px"
                          class="textarea {{$errors->has('body') ? 'is-danger' : '' }} " type="text" name="body"
                          id="body" placeholder="Alert body here.."></textarea>

                    @if ($errors->has('body'))
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                    @endif
                </div>
            </div>
            <br><br>

            <div class="field">
                <label class="lable" for="course">Choose course </label>

                <div class="select is-multible control">
                    <select name="course">

                        @foreach ($course as $course)

                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>


                    <br><br>

                </div>
            </div>


            <div style="float: right ; padding-right:30px; margin-bottom:30px">
                <button class="btn btn-success" type="submit"> confirm</button>
            </div>
            @if(session('message'))
                <div style="color: brown">{{session('message')}}</div>
            @endif
        </form>


    </div>
@endsection
