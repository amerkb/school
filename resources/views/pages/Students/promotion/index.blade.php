@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
    {{('Students Promotions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{('Students Promotions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->



                <div class="card-body">

                    @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                    <form method="" action="{{ route('store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{('Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{('Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{('Classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{('Section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{('Academic Year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{('Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id_new" >
                                    <option selected disabled>{{('Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{('Classrooms')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id_new" >

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{('Section')}} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{('Academic Year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="text-center">
                            <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>

                </div>


    <!-- row closed -->
@endsection
@section('js')

    @toastr_js
    @toastr_render


@endsection
