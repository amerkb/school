@extends('layouts.master')
@section('css')
@section('title')
     edit book {{$book->title}}
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
                            <form action="{{route('book_update')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">name book </label>
                                        <input type="text" name="title" value="{{$book->title}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$book->id}}" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{('Category')}} : </label>
                                            <select class="custom-select mr-sm-2" name="category">
                                                @foreach($types as $type)
                                                    <option {{$book->subject_category_id==$type->id? 'selected':''}} value="{{$type->id }}">{{ $type->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div><br>
                                <br>

                                <div class="form-row">


                                        <embed src="{{ URL::asset('attachments/book/'.$book->file_name) }}" type="application/pdf"   height="150px" width="100px"><br><br>


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
