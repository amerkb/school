@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ 'List Students' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'List Students' }}
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
                            <a href="{{ route('create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ 'Add Student' }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
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
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                            role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Pro
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item"
                                                                href="{{ route('show_Student', $student->id) }}"><i
                                                                    style="color: #ffc107"
                                                                    class="far fa-eye "></i>&nbsp; عرض بيانات الطالب</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('edit_Student', $student->id) }}"><i
                                                                    style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                تعديل بيانات الطالب</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('Invoices_show', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-edit"></i>&nbsp;اضافة فاتورة
                                                                رسوم&nbsp;</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('Receipt_show', $student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند
                                                                قبض</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('Process_show', $student->id) }}"><i
                                                                    style="color: #9dc8e2"
                                                                    class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;
                                                                استبعاد رسوم</a>
                                                            <a class="dropdown-item"
                                                                data-target="#Delete_Student{{ $student->id }}"
                                                                data-toggle="modal"
                                                                href="##Delete_Student{{ $student->id }}"><i
                                                                    style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                حذف بيانات الطالب</a>
                                                        </div>
                                                    </div>
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
