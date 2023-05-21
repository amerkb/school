@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{('Add new fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{('Add new fees')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="" action="{{route('storefee')}}" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        {{-- <div class="form-group col">
                            <label for="inputEmail4">الاسم باللغة العربية</label>
                            <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                        </div> --}}

                        <div class="form-group col">
                            <label for="inputEmail4">Title</label>
                            <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">The Amount</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">The Grade</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{('Choose') }}...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">The Class</label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">Academic year</label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>{{('Choose') }}...</option>
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">Fee type</label>
                            <select class="custom-select mr-sm-2" name="Fee_type">
                                <option value="1">Tuition fees</option>
                                <option value="2">Bus fees</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Notes</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
