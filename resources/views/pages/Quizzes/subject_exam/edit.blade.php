@extends('layouts.master')
@section('css')
    {{--    /*@toastr_css*/--}}
    @section('title')
        {{ 'Edit Subject For Exam' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'Add  lecture' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card">


        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Name: </strong> {{ $Quizze->name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Semester: </strong> {{ $Quizze->semester}}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Type: </strong> {{$Quizze->type->name}} {{ '('.$Quizze->year.')' }}</h6></div>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Edit Subject For Exam</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="{{route('se.update',$se->id)}}">
                            @csrf


                            <div class="form-group row">
                                <label for="day_id" class="col-lg-3 col-form-label font-weight-semibold">Grades <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select"
                                            name="Grade_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option {{ $grade-> id == $se->grade_id ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                        @endforeach
                                    </select>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Classes <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select"
                                            name="Classroom_id" id="teacher_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($classes as $class)
                                            <option {{ $class-> id == $se->classroom_id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Subject: <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select class="select form-control" required style="height: 50px" name="subject_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($subjects as $subject)
                                            <option {{ $subject-> id == $se->subject_id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">TimeSlot <span class="text-danger">*</span></label>
                                <div class="col-lg-9">

                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="ts_id" id="ts_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($ts as $ts)
                                            <option {{ $ts-> id == $se->ts_id ? 'selected' : '' }} value="{{ $ts->id }}">{{ $ts->full }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Date <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               id="datepicker-action" placeholder="Choose" value="{{$se->date}}" name="date" data-date-format="yyyy-m-d">
                                    </div>
                                </div>
                            </div>






                            <div class="text-center">
                                <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Subject') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subject_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection