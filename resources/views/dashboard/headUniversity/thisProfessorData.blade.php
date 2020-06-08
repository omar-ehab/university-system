@extends('layouts.dashboard.app')
@section('content')
    <div style="padding-left: 20px">


        <div class="col-md-6 col-sm-6 " style="width: 100%">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$professor_user->name}}'s data </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover" style="font-size:15px">
                        <thead style="font-size:16px ">
                        <tr>
                            <th>Data field</th>
                            <th>Record</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>

                            <td>Professor's Name</td>
                            <td>{{$professor_user->name}}</td>
                        </tr>


                        <tr>

                            <td>Professor's Email</td>
                            <td>{{$professor_user->email}}</td>
                        </tr>


                        <tr>

                            <td>Professor's Nationality</td>
                            <td>{{$professor_user->nationality}}</td>
                        </tr>

                        <tr>

                            <td>Professor's Gender</td>
                            <td>{{$professor_user->gender}}</td>
                        </tr>


                        <tr>

                            <td>Professor's Religion</td>
                            <td>{{$professor_user->religion}}</td>
                        </tr>


                        <tr>

                            <td>Professor's Mobile</td>
                            <td>{{$professor_user->mobile}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
