@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
    @section('title')
        {{ 'Manage Bus' }}
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



                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Name: </strong> {{ $bus->name }}</h6></div>
                        <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Number: </strong> {{ $bus->number }}</h6></div>
                    </div>
                </div>
                <div class="card-body">

                                <div class="row">
                                    <div style="margin-bottom: 26px" class="col-md-4 d-flex justify-content-center align-items-center">
                                        <a style="padding: 6px"  href="{{ route('trip_create',$bus->id) }}" class=" btn btn-success btn-sm" role="button"
                                                              aria-pressed="true"> Add   Trip </a></div>
                                    <div class="col-md-4 d-flex justify-content-center align-items-center"> <a style="background-color: black; padding: 6px" target="_blank" href="{{ route('ts.index') }}" class="btn  btn-sm" role="button"
                                                              aria-pressed="true"> <span style="color:white">View  TimeSlot</span> </a></div>
                                    <div class="col-md-4 d-flex justify-content-center align-items-center"> <a style="padding: 6px"  target="_blank" href="{{ route('ttr.show',$bus->id) }}" class="btn btn-danger btn-sm" role="button"
                                                              aria-pressed="true"> view TimeTable </a></div>
                                </div>
                                <div  class="table-responsive" style="padding-bottom: 100px">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>name</th>
                                            <th> places </th>
                                            <th> day </th>
                                            <th> time slot</th>
                                            <th> driver</th>
                                            <th>type</th>
                                            <th>year</th>
                                            <th>semester</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($trip as $trip )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $trip->name}}</td>
                                                <td>{{ $trip->places}}</td>
                                                <td>{{$trip->day->name }}</td>
                                                <td>{{ $trip->ts->full }}</td>
                                                <td>{{ $trip->driver->name }}</td>
                                                <td>{{ $trip->type }}</td>
                                                <td>{{ $trip->year }}</td>
                                                <td>{{ $trip->semester }}</td>
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
                                                               href="{{ route('l.edit', $trip->id) }}"><i
                                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                                &nbsp; Edit</a>
                                                            {{--destroy--}}
                                                            <a class="dropdown-item"
                                                               data-toggle="modal" data-target="#delete_l{{ $trip->id }}"
                                                               ><i
                                                                        style="color: red"
                                                                        class="fa fa-trash"></i>&nbsp;
                                                                &nbsp; delete</a>



                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

{{--                                        @include('pages.timetables.lecture.destroy')--}}
                                        @endforeach
                                    </table>
                                </div>
                            </div>




    {{--TimeTable Manage Ends--}}

@endsection
