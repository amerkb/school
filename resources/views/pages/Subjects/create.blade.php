@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/--}}
@section('title')
    Add Subject
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة مادة دراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->


            <div class="card-body">

                @if (session()->has('error'))
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
                        <form action="{{ route('Sub_store') }}" method="" autocomplete="off">
                            @csrf

                            <div class="form-row">
                                {{-- <div class="col">
                                        <label for="title">اسم المادة باللغة العربية</label>
                                        <input type="text" name="Name_ar" class="form-control">
                                    </div> --}}
                                <div class="col">
                                    <label for="title">Name Subject</label>
                                    <input type="text" name="Name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">Grade</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ 'Choose' }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">Classes</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Class_id">
                                        <option selected disabled>{{ 'Choose' }}...</option>
                                        @foreach ($Class as $class)
                                            <option value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">category</label>
                                    <select class="custom-select my-1 mr-sm-2" name="category_Id">
                                        <option selected disabled>{{ 'Choose' }}...</option>
                                        @foreach ($category as $categor)
                                            <option value="{{ $categor->id }}">{{ $categor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group col">
                                    <label for="inputState">Classroom</label>
                                    <select name="Class_id" class="custom-select"></select>
                                </div> --}}


                            </div>
                            <div class="text-center">
                                <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Class_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
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
