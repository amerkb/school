@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/--}}
    @section('title')
        Result List
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

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Create Subject For Exam</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Subject: <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                  <input list="student">
                                    <datalist>

                                    </datalist>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Subject: <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select class="select form-control" required style="height: 50px" name="subject_id">
                                        <option selected disabled>{{('Choose')}}...</option>

                                    </select>
                                </div>
                            </div>


        <div class="text-center">
            <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fa fa-send"></i></button>
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