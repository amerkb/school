@extends('layouts.master')
@section('css')
@section('title')
     edit curriculum {{$book->title}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل كتاب {{$book->title}}
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


                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Lib_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">اسم الكتاب</label>
                                        <input type="text" name="title" value="{{$book->title}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$book->id}}" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Grade_id">{{('Grade')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                <option selected disabled>{{('Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$book->Grade_id == $grade->id ?'selected':''}}>{{ $grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="subject_id">{{('Subject')}} : </label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                @foreach($subject as $subjec)
                                                    <option {{ $subjec->id==$book->subject_id?"selected":"" }} value="{{ $subjec->id }}">{{ $subjec->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{('Classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                                @foreach($classes as $class)
                                                    <option {{ $class->id==$book->Classroom_id?"selected":"" }} value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{('Classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="">

                                        </div>
                                    </div>


                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{('Year')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="year">
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                                    <option {{$book->year ==$year."-".$year +1 ?'selected':''}} value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                                @endfor </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="form-row">


                                        <embed src="{{ URL::asset('attachments/library/'.$book->file_name) }}"
                                               type="application/pdf"   height="150px" width="100px"><br><br>


                                            <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf"  name="file_name">



                                </div>

                                <div class="text-center">
                                    <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                                </div>  </form>
                        </div>
                    </div>
                </div>


    <!-- row closed -->
@endsection
@section('js')

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
