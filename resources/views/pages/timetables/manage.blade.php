@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ 'Manage TimeTable' }}
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

    <div class="row">
        <div class="col-md-12 mb-30">

            <div class="card card-statistics h-100">
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

                                <div class="row">
                                    <div style="margin-bottom: 26px" class="col-md-4">
                                        <a style="padding: 6px"  href="{{ route('l.create',$ttr->id) }}" class="btn btn-success btn-sm" role="button"
                                                              aria-pressed="true"> Add Lecture </a></div>
                                    <div class="col-md-4"> <a style="background-color: black; padding: 6px" target="_blank" href="{{ route('ts.index') }}" class="btn  btn-sm" role="button"
                                                              aria-pressed="true"> <span style="color:white">View  TimeSlot</span> </a></div>
                                    <div class="col-md-4"> <a style="padding: 6px"  target="_blank" href="{{ route('ttr.show',$ttr->id) }}" class="btn btn-danger btn-sm" role="button"
                                                              aria-pressed="true"> view TimeTable </a></div>
                                </div>
                                <div  class="table-responsive" style="padding-bottom: 100px">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>subject</th>
                                            <th>teacher</th>
                                            <th> day </th>
                                            <th> time slot</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($lectures as $lecture )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lecture->subject->name}}</td>
                                                <td>{{$lecture->teacher->Name }}</td>
                                                <td>{{$lecture->day->name }}</td>
                                                <td>{{ $lecture->ts->full }}</td>
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
                                                               href="{{ route('l.edit', $lecture->id) }}"><i
                                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                                &nbsp; Edit</a>
                                                            {{--destroy--}}
                                                            <a class="dropdown-item"

                                                               href="{{ route('l.delete', $lecture->id) }}"><i
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
                </div>
            </div>
        </div>
    </div>


    {{--TimeTable Manage Ends--}}

@endsection
