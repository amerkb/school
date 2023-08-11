@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/ --}}
    @section('title')
        {{ 'View Exam TimeTable' }}
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
                <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Name: </strong> {{ $Quizze->name }}</h6></div>
                <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Semester: </strong> {{ $Quizze->semester}}</h6></div>
                <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Type: </strong> {{$Quizze->type->name}} {{ '('.$Quizze->year.')' }}</h6></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table datatable-button-html5-columns">
                <thead>
                <tr>
                    <th style="border:1px solid #343a40 ; text-align: center">Date/Class</th>
                    @foreach($classes as $class)

                        <th style="text-align: center ; border:1px solid #343a40">{{$class->Name_Class}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($date as $d)
                    <tr>
                          <td style="border:1px solid #343a40 ; text-align: center">{{\Carbon\Carbon::createFromFormat("Y-m-d",$d)->format("D")}}<br> ({{$d}})</td>
                        @foreach($classes as $class)
                            @forelse (\App\Models\SubjectExam::where('classroom_id', $class->id)->where('date',$d)->get() as $se)
                                <td class="text-center font-weight-bold" style="border:1px solid #343a40">{{$se->subject->name }}<br><span style="font-size: 12px ">({{$se->timeslot->full }})</span></td>
                            @empty
                                <td class="text-center font-weight-bold" style="border:1px solid #343a40 ; background-color: #343a40"><span style="color: whitesmoke">Empty</span></td>
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