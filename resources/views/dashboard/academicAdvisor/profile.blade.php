@extends('layouts.dashboard.app')
@section('content')
    <div style="padding-left: 20px">
        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$user->name}}'s data </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover table-bordered" style="font-size:15px">
                        <thead style="font-size:16px ">
                        <tr>
                            <th style="width: 20%">Data field</th>
                            <th>Record</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$user->name}}</td>
                        </tr>


                        <tr>

                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>


                        <tr>

                            <td>Birthdate</td>
                            <td>{{$user->birth_date}}</td>
                        </tr>

                        <tr>

                            <td>Mobile number</td>
                            <td>{{$user->mobile}}</td>
                        </tr>


                        <tr>

                            <td>Religion</td>
                            <td>{{$user->religion}}</td>
                        </tr>


                        <tr>

                            <td>Gender</td>
                            <td>{{$user->gender}}</td>
                        </tr>

                        <tr>

                            <td>Nationality</td>
                            <td>{{$user->nationality}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
