@extends('layouts.master')
@section('css')

    @section('title')
        Edit Question
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        اضافة كتاب جديد
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <form action="{{route('Questionli_update',$book->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="col">
                            <label for="title">name book </label>
                            <input type="text" value="{{$book->title}}" name="title" class="form-control">
                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="Grade_id">{{('Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{('Choose')}}...</option>
                                    @foreach($grades as $grade)
                                        <option {{ $grade->id==$book->grade_id?"selected":"" }} value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Classroom_id">{{('Classrooms')}} : <span class="text-danger">*</span></label>
                                @php
                                    $classes= \App\Models\Classroom::where("Grade_id",$book->grade_id)->get();
                                @endphp
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    @foreach($classes as $class)
                                        <option {{ $class->id==$book->Classroom_id?"selected":"" }} value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="Classroom_id">{{('Quizze')}} : <span class="text-danger">*</span></label>

                                <select class="custom-select mr-sm-2" name="Quizze_Id">
                                    @foreach($quizzes as $quizze)
                                        <option {{ $quizze->id==$book->quizze_id?"selected":"" }} value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="Classroom_id">{{('Subject')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Se_Id">
                                    @foreach($se as $s)
                                        <option {{ $s->id==$book->quizzes_subject_id?"selected":"" }} value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                    </div><br>



                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="academic_year">Attachment : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/pdf" name="file_name" >
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <embed src="{{ URL::asset('attachments/question/'.$book->file_name) }}" type="application/pdf"   height="150px" width="100px"><br><br>

                        <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                    </div>   </form>
            </div>
        </div>
    </div>

    <!-- row closed -->
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
                        url: "{{ URL::to('Questionli_exam') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Quizze_Id"]').empty();
                            $('select[name="Quizze_Id"]').append('<option selected disabled> choose...</option>');
                            $.each(data, function (key, value) {

                                $('select[name="Quizze_Id"]').append('<option value="' + key + '">' + value + '</option>');
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

    <script>
        $(document).ready(function () {
            $('select[name="Quizze_Id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Questionli_se') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Se_Id"]').empty();
                            $('select[name="Se_Id"]').append('<option selected disabled> choose...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Se_Id"]').append('<option value="'+ key +'">' + value + '</option>');
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
