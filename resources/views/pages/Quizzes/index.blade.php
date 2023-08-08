@extends('layouts.master')
@section('css')
{{--    @toastr_css--}}
@section('title')
    Quizzes list
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الاختبارات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

            <div class="card-body">
                <a href="{{ route('Qui_create') }}" class="btn btn-success btn-sm" role="button"
                   aria-pressed="true"> Add Quizze </a><br><br>
                <div class="table-responsive" style="padding-bottom: 100px">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50" style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Test Name</th>
                            <th>type</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Process</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $quizze)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{$quizze->name}}</td>
                                <td>{{$quizze->type->name}}</td>
                                <td>{{$quizze->year}}</td>
                                <td>{{$quizze->semester}}</td>
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
                                               href="{{route("quizze.view",$quizze->id)}}"><i
                                                        style="color: #ffc107"
                                                        class="far fa-eye "></i>&nbsp;   view</a>
                                            {{--  mange--}}
                                            <a class="dropdown-item"
                                               href="{{route("quizze.manage",$quizze->id)}}"><i
                                                        style="color:green" class="fa fa-tasks"></i>&nbsp;
                                                mange</a>
                                            {{--Edit--}}
                                            <a class="dropdown-item"
                                               href="{{route('Qui_edit',$quizze->id)}}"><i
                                                        style="color: #83ae26" class="fa fa-edit"></i>&nbsp;
                                                &nbsp; Edit</a>
                                            {{--destroy--}}

                                            <a class="dropdown-item"
                                               data-toggle="modal"
                                               data-target="#delete_q{{ $quizze->id }}"
                                           ><i
                                                        style="color: red"
                                                        class="fa fa-trash"></i>&nbsp;
                                                &nbsp; delete</a>




                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @include('pages.Quizzes.destroy')
                        @endforeach
                    </table>
                </div>
            </div>


    <!-- row closed -->
@endsection
@section('js')
@endsection
