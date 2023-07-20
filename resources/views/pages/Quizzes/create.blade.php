@extends('layouts.master')
@section('css')
{{--    @toastr_css--}}
@section('title')
    Add Quizzes
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة اختبار جديد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
                            <form action="{{route('Qui_store')}}" method="" autocomplete="off">
                                @csrf

                                <div class="form-row">

                                    {{-- <div class="col">
                                        <label for="title">اسم الاختبار باللغة العربية</label>
                                        <input type="text" name="Name_ar" class="form-control">
                                    </div> --}}

                                    <div class="col">
                                        <label for="title">Test Name</label>
                                        <input required type="text" name="Name_en" class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">Semester : <span class="text-danger"></span></label>
                                            <select required class="custom-select mr-sm-2" name="semester">
                                                <option selected disabled>Chose</option>
                                                <option  value=1>the first semester </option>
                                                <option  value=2>the second semester </option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                        <label for="academic_year">{{('Year')}} : <span class="text-danger"></span></label>
                                        <select required class="custom-select mr-sm-2" name="Year">
                                            <option selected disabled>{{('Choose')}}...</option>
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                                <option value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                            @endfor
                                        </select>
                                    </div></div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">Type : <span class="text-danger"></span></label>
                                            <select required class="custom-select mr-sm-2" name="type_id">
                                                <option selected disabled>Choose</option>
                                                @foreach($types as $type)
                                                    <option  value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">


                                </div>

                                <div class="text-center">
                                    <button id="ajax-btn" type="submit"
                                            class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>
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
@endsection
