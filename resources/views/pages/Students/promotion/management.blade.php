@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
    {{('List Promotion')}}
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



                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                   Back All
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{('Name')}}</th>
                                            <th class="alert-danger">Previous school stage</th>
                                            <th class="alert-danger">Academic year</th>
                                            <th class="alert-danger">Previous class</th>
                                            <th class="alert-danger">Previous academic section</th>
                                            <th class="alert-success">Current school stage</th>
                                            <th class="alert-success">Current academic year</th>
                                            <th class="alert-success">Current class</th>
                                            <th class="alert-success">The current academic section</th>
                                            <th>{{('Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->Name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->Name_Class}}</td>
                                                <td>{{$promotion->f_section->Name_Section}}</td>
                                                <td>{{$promotion->t_grade->Name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->Name_Class}}</td>
                                                <td>{{$promotion->t_section->Name_Section}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب</button>
                                                    {{-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">تخرج الطالب</button> --}}
                                                </td>
                                            </tr>
                                        @include('pages.Students.promotion.Delete_all')
                                        @include('pages.Students.promotion.Delete_one')
                                        @endforeach
                                    </table>
                                </div>
                            </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection
