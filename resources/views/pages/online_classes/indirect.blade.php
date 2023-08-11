@extends('layouts.master')
@section('css')
@section('title')
    Add online lecture
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة حصة جديدة اوفلاين
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

                <form method="" action="{{ route('Online_storeIndirect') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ ('Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{('Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ ('Classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">{{('Section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">

                                </select>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>رقم الاجتماع : </label>
                                <input class="form-control" name="meeting_id" type="number">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>topic</label>
                                <input class="form-control" name="topic" type="text">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>start_time </label>
                                <input class="form-control" type="datetime-local" name="start_time">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>password <span class="text-danger">*</span></label>
                                <input class="form-control" name="password" type="text">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>duration <span class="text-danger">*</span></label>
                                <input class="form-control" name="duration" type="number">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold">Year <span class="text-danger">*</span></label>
                            <select class="form-control select" style="height: 50px;" name="Year">
                                <option selected disabled>{{('Choose')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                @endfor
                            </select>
                        </div>
                  <div class="col-md-4">
                      <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold"> semester <span class="text-danger">*</span></label>
                      <select required data-placeholder="Select Class"style="height: 50px"  class="form-control select" name="semester" id="semester_id">
                                <option selected disabled>{{('Choose')}}...</option>
                                <option  value= 1 > the first semester </option>
                                <option value= 2 > the second semester </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>لينك البدء : <span class="text-danger">*</span></label>
                                <input class="form-control" name="start_url" type="text">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>join_url <span class="text-danger">*</span></label>
                                <input class="form-control" name="join_url" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>

            </div>

<!-- row closed -->
@endsection
@section('js')

@endsection
