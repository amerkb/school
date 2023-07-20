@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
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
<div class="card-body">
    @php
        $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
    @endphp
    @if(IsManager($type) ||IsOriented($type) )
    <a href="{{ route('create') }}" class="btn btn-success btn-sm" role="button"
       aria-pressed="true">{{ 'Add Student' }}</a><br><br>
    @endif
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
               data-page-length="50" style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ 'Name' }}</th>
                <th>{{ 'academic year' }}</th>
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
                    <td>{{ $student->academic_year }}</td>
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
                                @if(IsManager($type) || IsOriented($type))
                                <a class="dropdown-item"
                                   href="{{ route('show_Student', $student->id) }}"><i
                                            style="color: #ffc107"
                                            class="far fa-eye "></i>&nbsp; عرض بيانات الطالب</a>
                                <a class="dropdown-item"
                                   href="{{ route('show_exam', $student->id) }}"><i
                                            style="color: #5e2e2e"
                                            class="fas fa-poll"></i>&nbsp; عرض   نتائج الطالب</a>

                                <a class="dropdown-item"
                                   href="{{ route('show_attendance', $student->id) }}"><i
                                            style="color:brown" class="fas fa-calendar-times"></i>&nbsp;
                                    عرض غيابات الطالب</a>
                                <a class="dropdown-item"
                                   href="{{ route('edit_Student', $student->id) }}"><i
                                            style="color:green" class="fa fa-edit"></i>&nbsp;
                                    تعديل بيانات الطالب</a>
                                <a class="dropdown-item"
                                   data-target="#Delete_Student{{ $student->id }}"
                                   data-toggle="modal"
                                   href="##Delete_Student{{ $student->id }}"><i
                                            style=" color: red" class="fa fa-trash"></i>&nbsp;
                                    حذف بيانات الطالب</a>
                                @endif
                                   @if(IsManager($type) || IsAccountant($type))
                                <a class="dropdown-item"
                                   href="{{ route('Invoices_show', $student->id) }}"><i
                                            style="color: #0000cc"
                                            class="fa fa-edit"></i>&nbsp;اضافة فاتورة
                                    رسوم&nbsp;</a>
                                <a class="dropdown-item"
                                   href="{{ route('Receipt_show', $student->id) }}"><i
                                            style="color: #0e4e76"
                                            class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند
                                    قبض</a>
                                <a class="dropdown-item"
                                   href="{{ route('Process_show', $student->id) }}"><i
                                            style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                    &nbsp;
                                    استبعاد رسوم</a>
                                <a class="dropdown-item"
                                   href="{{ route('Payment_show', $student->id) }}"><i
                                            style="color:goldenrod"
                                            class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a>
                                    <a class="dropdown-item"
                                       href="{{ route('account_statement', $student->id) }}"><i
                                                style="color:blue"
                                                class="fas fa-file-invoice"></i>&nbsp; &nbsp; كشف حساب</a>
                                @endif

                            </div>
                        </div>
                    </td>
                </tr>
            @include('pages.Students.Delete')
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
