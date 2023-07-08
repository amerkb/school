@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
    {{ 'List Graduate' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'List Graduate' }} <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ 'Name' }}</th>
                                            <th>{{ 'Email' }}</th>
                                            <th>{{ 'Gender' }}</th>
                                            <th>{{ 'Grade' }}</th>
                                            <th>{{ 'Classrooms' }}</th>
                                            <th>{{ 'Section' }}</th>
                                            <th>{{ 'Processes' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->Name }}</td>
                                                <td>{{ $student->grade->Name }}</td>
                                                <td>{{ $student->classroom->Name_Class }}</td>
                                                <td>{{ $student->section->Name_Section }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Return_Student{{ $student->id }}"
                                                        title="{{ 'Delete' }}">Return Student</button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Student{{ $student->id }}"
                                                        title="{{ 'Delete' }}">Delete Student</button>

                                                </td>
                                            </tr>
                                            @include('pages.Students.Graduated.return')
                                            @include('pages.Students.Graduated.Delete')
                                        @endforeach
                                </table>
                            </div>
                        </div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
