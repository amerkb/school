@extends('layouts.master')
@section('css')

@section('title')
    {{ ('Add User') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{('Add User') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->




                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
    <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('ori_store')}}" method="">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{('Email')}}</label>
                                    <input type="email" name="Email" class="form-control" value=".">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{('Password')}}</label>
                                    <input type="password" name="Password" class="form-control">
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
                                <div class="col">
                                    <label for="title">{{('Name')}}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                    @error('Name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{('Type User')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="type_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($type_user as $specialization)
                                            <option value="{{$specialization->id}}">{{$specialization->type}}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{('Gender')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
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
                                        <input class="form-control" type="text"  id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{('Address')}}</label>
                                <textarea class="form-control" name="Address"
                                          id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="col">
                                    <div class="form-check">

                                        {{-- @if ($Oriented->Status === 1) --}}
                                        <input
                                                type="checkbox"
                                                checked
                                                class="form-check-input"
                                                name="Status"
                                                id="exampleCheck1">
                                        {{-- @else --}}
                                        <input
                                                type="checkbox"
                                                class="form-check-input"
                                                name="Status"
                                                checked
                                                id="exampleCheck1">
                                        {{-- @endif --}}
                                        <label
                                                class="form-check-label"
                                                for="exampleCheck1">{{ 'Status' }}</label><br>

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

@endsection
