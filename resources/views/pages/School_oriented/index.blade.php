@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ 'List Users' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'List Users' }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                            <a href="{{route('ori_create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ 'Add New User' }}</a><br><br>
                <div class="d-block d-md-flex nav-tabs-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active show" id="students-tab" data-toggle="tab"
                               href="#students" role="tab" aria-controls="students"
                               aria-selected="true"> الطلاب</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                               role="tab" aria-controls="teachers" aria-selected="false">المعلمين
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                               role="tab" aria-controls="parents" aria-selected="false">اولياء الامور
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                               role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">

                    {{--students Table--}}
                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>اسم الطالب</th>
                                    <th>البريد الالكتروني</th>
                                    <th>النوع</th>
                                    <th>المرحلة الدراسية</th>
                                    <th>الصف الدراسي</th>
                                    <th>القسم</th>
                                    <th>تاريخ الاضافة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->gender->Name}}</td>
                                        <td>{{$student->grade->Name}}</td>
                                        <td>{{$student->classroom->Name_Class}}</td>
                                        <td>{{$student->section->Name_Section}}</td>
                                        <td class="text-success">{{$student->created_at}}</td>
                                        @empty
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--teachers Table--}}
                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>اسم المعلم</th>
                                    <th>النوع</th>
                                    <th>تاريخ التعين</th>
                                    <th>التخصص</th>
                                    <th>تاريخ الاضافة</th>
                                </tr>
                                </thead>

                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                    <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->Name}}</td>
                                        <td>{{$teacher->genders->Name}}</td>
                                        <td>{{$teacher->Joining_Date}}</td>
                                        <td>{{$teacher->specializations->Name}}</td>
                                        <td class="text-success">{{$teacher->created_at}}</td>
                                        @empty
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                    </tr>
                                    </tbody>
                                @endforelse
                            </table>
                        </div>
                    </div>

                    {{--parents Table--}}
                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>اسم ولي الامر</th>
                                    <th>البريد الالكتروني</th>
                                    <th>رقم الهوية</th>
                                    <th>رقم الهاتف</th>
                                    <th>تاريخ الاضافة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$parent->Name_Father}}</td>
                                        <td>{{$parent->email}}</td>
                                        <td>{{$parent->National_ID_Father}}</td>
                                        <td>{{$parent->Phone_Father}}</td>
                                        <td class="text-success">{{$parent->created_at}}</td>
                                        @empty
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--sections Table--}}
                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>تاريخ الفاتورة</th>
                                    <th>اسم الطالب</th>
                                    <th>المرحلة الدراسية</th>
                                    <th>الصف الدراسي</th>
                                    <th>القسم</th>
                                    <th>نوع الرسوم</th>
                                    <th>المبلغ</th>
                                    <th>تاريخ الاضافة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\FeeInvoices::latest()->take(10)->get() as $section)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$section->invoice_date}}</td>
                                        {{-- <td>{{$section->My_classs->Name_Class}}</td> --}}
                                        <td class="text-success">{{$section->created_at}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

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
