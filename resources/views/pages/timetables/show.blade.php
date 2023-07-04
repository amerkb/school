@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ 'View TimeTable' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'View TimeTable' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Name: </strong> {{ $ttr->name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Grade: </strong> {{ $ttr->grades->Name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Class: </strong> {{ $ttr->classrooms->Name_Class }}</h6></div>
            </div>
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Section: </strong> {{ $ttr->sections->Name_Section  }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Semester: </strong> {{ $ttr->semester}}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Year: </strong>Class TimeTable {{ '('.$ttr->year.')' }}</h6></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th style="border:1px solid #343a40 ; text-align: center">Days/Time</th>
               @foreach($time_slot as $ts)

                    <th style="border:1px solid #343a40 ; text-align: center">{{$ts->full}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                     @foreach($days as $day)
                    <tr>
                        <td style="border:1px solid #343a40 ; text-align: center">{{ $day->name }}</td>
                        @foreach($time_slot as $ts)
                        @forelse (\App\Models\lecture::where('ts_id', $ts->id)->where('day_id', $day->id)->get() as $lecture)
                                <td style="border:1px solid #343a40 ; text-align: center" class="text-center font-weight-bold">{{$lecture->subject->name }}<br><span style="font-size: 12px ">({{$lecture->teacher->Name }})</span></td>
                            @empty
                                <td  class="text-center font-weight-bold" style="background-color: #343a40"><span style="color: whitesmoke">Empty</span></td>
                            @endforelse
                            @endforeach
                    </tr>
                        @endforeach

{{--                        <td>{{ $ttr->my_class->name }}</td>--}}
{{--                        <td>{{ ($ttr->exam_id) ? $ttr->exam->name : 'Class TimeTable' }}--}}
{{--                        <td>{{ $ttr->year }}</td>--}}


                </tbody>
            </table>

    </div>
    </div>

@endsection