@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ 'View TimeSlot' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'View  TimeSlot' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{ route('ts.create') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"> Add TimeSlot </a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>from time</th>
                                            <th>to time</th>
                                            <th>full time</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ts as $ts )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ts->time_from }}</td>
                                                <td>{{ $ts->time_to }}</td>
                                                <td>{{ $ts->full }}</td>
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
                                                               href="{{ route('ts.edit', $ts->id) }}"><i
                                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                                &nbsp; Edit</a>
                                                            {{--destroy--}}
                                                            <a class="dropdown-item"

                                                               href="{{ route('ts.delete', $ts->id) }}"><i
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

@endsection

