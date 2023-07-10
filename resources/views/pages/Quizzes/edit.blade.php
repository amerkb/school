@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/ --}}
@section('title')
    Edit quizze
{{$quizz->name}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل اختبار {{$quizz->name}}
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
                            <form action="{{route('Qui_update','test')}}" method="">
                                @csrf
                                @method('')
                                <div class="form-row">

                                    {{-- <div class="col">
                                        <label for="title">اسم الاختبار باللغة العربية</label>
                                        <input type="text" name="Name_ar" value="{{$quizz->getTranslation('name','ar')}}" class="form-control">
                                        <input type="hidden" name="id" value="{{$quizz->id}}">
                                    </div> --}}

                                    <div class="col">
                                        <label for="title">Name Quizze</label>
                                        <input type="text" name="Name_en" value="{{$quizz->name}}" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="id" value="{{$quizz->id}}">

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">semester <span class="text-danger"></span></label>
                                            <select required class="custom-select mr-sm-2" name="semester">
                                                <option selected disabled>Chose</option>
                                                <option {{ $quizz->semester == "the first semester" ? 'selected' : '' }}  value= 1 > the first semester </option>
                                                <option  {{ $quizz->semester == "the second semester" ? 'selected' : '' }} value= 2 > the second semester </option>

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
                                                    <option  {{ $quizz->year == $year."-".$year +1 ? 'selected' : '' }} value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                                @endfor
                                            </select>
                                        </div></div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">Type : <span class="text-danger"></span></label>
                                            <select required class="custom-select mr-sm-2" name="type_id">
                                                <option selected disabled>Chose</option>
                                                @foreach($types as $type)
                                                    <option {{ $quizz->type_exam_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                         <br>
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
{{--    @toastr_js--}}
{{--    @toastr_render--}}
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
