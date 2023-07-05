@extends('layouts.master')
@section('css')
    {{--    /*@toastr_css*/--}}
    @section('title')
        Add Result
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
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Add Result</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="day_id" class="col-lg-3 col-form-label font-weight-semibold">Choose Quizze: <span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"
                                            style="height: 50px" class="form-control select" name="quizze" id="quizze_select">
                                        <option selected disabled>{{('Choose')}}...</option>

                                        @foreach($quizzes as $quizze)
                                            <option value="{{$quizze->id}}">{{$quizze->name}}({{$quizze->year}})</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Choose Subject: <span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"
                                            style="height: 50px" class="form-control select"
                                            name="subject" id="subject_select">
                                        <option selected disabled>{{('Choose')}}...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-lg-3 col-form-label font-weight-semibold" for="student">Choose a student:</label>
                                <input style="    width: 70%;
    margin-left: 14px;
    border: none;
    background-color: whitesmoke;
    height: 42px;" list="students" name="student" id="student-input" >

                                <datalist  id="students">
                                    <option selected disabled value="33" data-id="1">John </option>
                                    <option value="Mary" data-id="2">
                                    <option value="David" data-id="3">
                                    <option value="Sarah" data-id="4">
                                </datalist>
                            </div>

                            <div class="form-group row">
                                <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">TimeSlot <span class="text-danger">*</span></label>
                                <div class="col-lg-9">

                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="ts_id" id="ts_id">
                                        <option selected disabled>{{('Choose')}}...</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Date <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input class="form-control" type="text"
                                               id="datepicker-action" placeholder="Choose" name="date" data-date-format="yyyy-m-d">
                                    </div>
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
        $(document).ready(function() {
            $('#quizze_select').change(function() {
                var quizzeId = $(this).val();
                if (quizzeId) {
                    $.ajax({
                        url: '/Get_Subject_quizze/' + quizzeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            $('#subject_select').empty();
                            $('#subject_select').append('<option selected disabled>{{('Choose')}}...</option>');
                            $.each(data, function(key, value) {
                                $('#subject_select').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subject_select').empty();
                    $('#subject_select').append('<option selected disabled>{{('Choose')}}...</option>');
                }
            });
        });
    </script>
    <script>
        const subjectSelect = document.getElementById('subject_select');
        const studentInput = document.getElementById('student-input');
        const studentList = document.getElementById('students');

        // Attach an event listener to the subject select element that retrieves the list of students
        subjectSelect.addEventListener('change', function () {
            const selectedSubject = subjectSelect.options[subjectSelect.selectedIndex].value;
            const url = "{{ url('/Get_Subject_quizze') }}/" + 1;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send an AJAX request to retrieve the list of students
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (Array.isArray(data)) {
                        data.forEach(student => {
                            const option = document.createElement('option');
                            option.value = id;
                            studentList.appendChild(option);
                        });
                    } else {
                        console.error("Unexpected data format:", data);
                    }
                })
                .catch(error => console.error(error));
        });
    </script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('select[name="Classroom_id"]').on('change', function () {--}}
{{--                var Classroom_id = $(this).val();--}}
{{--                if (Classroom_id) {--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ URL::to('Get_Subject') }}/" + Classroom_id,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success: function (data) {--}}
{{--                            $('select[name="subject_id"]').empty();--}}
{{--                            $.each(data, function (key, value) {--}}
{{--                                $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');--}}
{{--                            });--}}

{{--                        },--}}
{{--                    });--}}
{{--                }--}}

{{--                else {--}}
{{--                    console.log('AJAX load did not work');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection