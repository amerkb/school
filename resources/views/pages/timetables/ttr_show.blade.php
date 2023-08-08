@extends('layouts.master')
@section('css')
{{--    @toastr_css--}}
    @section('title')
        {{ 'List TimeTable' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'List TimeTable' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


                <div class="card-body">
                                <a href="{{ route('time_index') }}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"> Add TimeTable </a><br><br>
                                <div class="table-responsive" style="padding-bottom: 100px">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50" style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Grade</th>
                                            <th>Class</th>
                                            <th>ٍSection</th>
                                            <th>Year</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tt_records as $ttr )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ttr->name }}</td>
                                                <td>{{ $ttr->grades->Name }}</td>
                                                <td>{{ $ttr->classrooms->Name_Class }}</td>
                                                <td>{{ $ttr->sections->Name_Section }}</td>
                                                <td>{{ $ttr->year }}</td>
                                                <td>{{ $ttr->semester }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            {{--  view--}}
                                                            <a class="dropdown-item" target="_blank"
                                                               href="{{ route('ttr.show', $ttr->id) }}"><i
                                                                        style="color: #ffc107"
                                                                        class="far fa-eye "></i>&nbsp;   view</a>
                                                            {{--  mange--}}
                                                            <a class="dropdown-item"
                                                               href="{{ route('ttr.manage', $ttr->id) }}"><i
                                                                        style="color:green" class="fa fa-tasks"></i>&nbsp;
                                                                mange</a>
                                                            {{--Edit--}}
                                                            <a class="dropdown-item"
                                                               href="{{ route('ttr.edit', $ttr->id) }}"><i
                                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                                &nbsp; Edit</a>
                                                            {{--destroy--}}
                                                            <a class="dropdown-item"
                                                               data-toggle="modal" data-target="#delete_ttr{{ $ttr->id }}"><i
                                                                        style="color: red"
                                                                        class="fa fa-trash"></i>&nbsp;
                                                               &nbsp; delete</a>




                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @include('pages.timetables.destroy')
                                        @endforeach
                                    </table>
                                </div>
                            </div>


    <!-- row closed -->
@endsection
@section('js')
@endsection
