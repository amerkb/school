@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/--}}
    @section('title')
        {{ 'Manage Quizze' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'Manage TimeTable' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')


        <div class="col-md-12 mb-30">

            <div class="card card-statistics h-100">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4"><h6 class="card-title"><strong>Name: </strong> {{ $Quizze->name }}</h6></div>
                        <div class="col-md-4"><h6 class="card-title"><strong>Semester: </strong> {{ $Quizze->semester}}</h6></div>
                        <div class="col-md-4"><h6 class="card-title"><strong>Type: </strong> {{$Quizze->type->name}} {{ '('.$Quizze->year.')' }}</h6></div>
                    </div>
                </div>
                <div class="card-body">

                                <div class="row">
                                    <div style="margin-bottom: 26px" class="col-md-4">
                                        <a style="padding: 6px"  href="{{route("se.add",$Quizze->id)}}" class="btn btn-success btn-sm" role="button"
                                                              aria-pressed="true"> Add Subject </a></div>
                                    <div class="col-md-4"> <a style="background-color: black; padding: 6px" target="_blank" href="{{ route('ts.index') }}" class="btn  btn-sm" role="button"
                                                              aria-pressed="true"> <span style="color:white">View  TimeSlot</span> </a></div>
                                    <div class="col-md-4"> <a style="padding: 6px"  target="_blank" href="" class="btn btn-danger btn-sm" role="button"
                                                              aria-pressed="true"> view TimeTable </a></div>
                                </div>
                                <div  class="table-responsive" style="padding-bottom: 100px">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>subject</th>
                                            <th>Grade</th>
                                            <th> Class </th>
                                            <th> time slot</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ses as $se )
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $se->subject->name}}</td>
                                                <td>{{$se->grade->Name }}</td>
                                                <td>{{$se->classroom->Name_Class }}</td>
                                                <td>{{ $se->timeslot->full }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            {{--Edit--}}
                                                            <a class="dropdown-item"
                                                               href="{{route("se.edit",$se)}}"><i
                                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                                &nbsp; Edit</a>
                                                            {{--destroy--}}
                                                            <a class="dropdown-item"

                                                               href=""><i
                                                                        style="color: red"
                                                                        class="fa fa-trash"></i>&nbsp;
                                                                &nbsp; delete</a>




                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



    {{--TimeTable Manage Ends--}}

@endsection
