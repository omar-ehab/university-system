@extends('layouts.dashboard.app')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12" style="height: 100vh;">
        <div class="x_panel">
            <div class="x_title">
                <h2>Calendar</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="calendar" class="fc fc-unthemed fc-ltr">
                    <div class="fc-view-container" style="">
                        <div class="fc-view fc-month-view fc-basic-view" style="">
                            <table class="calendar">
                                <thead>
                                <tr>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 0)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 1)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 2)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 3)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 4)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($data as $dayData)
                                            @if($dayData->day_number == 5)
                                                <span
                                                    class="element">{{ \App\Course::find($dayData->course_id)->name }} ({{ \App\Classroom::find($dayData->classroom_id)->code }}) ({{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->from_time)->format('h:i A') }} : {{ \Carbon\Carbon::createFromFormat('H:i:s', $dayData->to_time)->format('h:i A') }})</span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
