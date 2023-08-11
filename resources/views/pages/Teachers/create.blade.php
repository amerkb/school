@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */--}}
@section('title')
    {{ ('Add Teacher') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{('Add Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


                    <div class="col-xs-12">
                        <div class="col-md-12">


                            <br>
                            <form action="{{route('storeteacher')}}" method="">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{('Email')}}</label>
                                    <input required type="email" name="Email" class="form-control">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{('Password')}}</label>
                                    <input required type="password" name="Password" class="form-control">
                                    @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                {{-- <div class="col">
                                    <label for="title">{{('Teacher_trans.Name_ar')}}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                    @error('Name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="col-xl-6">
                                    <label for="title">{{('Name')}}</label>
                                    <input required type="text" name="Name_en" class="form-control">
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6">
                                    <label for="title">{{('Phone')}}</label>
                                    <input required type="text" name="phone" class="form-control">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{('specialization')}}</label>
                                    <select required class="custom-select my-1 mr-sm-2" name="Specialization_id">

                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{('Gender')}}</label>
                                    <select required class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{('Joining Date')}}</label>
                                    <div class='input-group date'>
                                        <input required class="form-control" type="text"  id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{('Address')}}</label>
                                <textarea required class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="text-center">
                                    <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                                </div>  </form>
                        </div>
                    </div>



    <!-- row closed -->
@endsection
@section('js')

@endsection