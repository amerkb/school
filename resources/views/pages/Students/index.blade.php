@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{('List Students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{('List Students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{('Add Student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{('Name')}}</th>
                                            <th>{{('Email')}}</th>
                                            <th>{{('Gender')}}</th>
                                            <th>{{('Grade')}}</th>
                                            <th>{{('Classrooms')}}</th>
                                            <th>{{('Section')}}</th>
                                            <th>{{('Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('edit_Student',$student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ ('Delete') }}"><i class="fa fa-trash"></i></button>
                                                    <a href="{{route('show_Student',$student->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @include('pages.Students.Delete')
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
