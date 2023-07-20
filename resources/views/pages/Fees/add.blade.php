@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/--}}
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
                            <input required type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">The Amount</label>
                            <input required type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>
                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">The Grade</label>
                            <select required class="custom-select mr-sm-2" name="Grade_id">
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
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">Fee type</label>
                            <select class="custom-select mr-sm-2" name="Fee_type">
                                <option value="1">Tuition fees</option>
                                <option value="2">Bus fees</option>
                                <option value="2">clothes fees</option>
                                <option value="2">Book fees</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Notes</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>
                    <div class="text-center">
                        <button id="ajax-btn" type="submit"
                                class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>

            </div>


<!-- row closed -->
@endsection
@section('js')

@endsection
