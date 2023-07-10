@extends('layouts.master')
@section('css')

    @section('title')
        {{ 'Add lecture' }}
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


        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Name: </strong> {{ $ttr->name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Grade: </strong> {{ $ttr->grades->Name }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Class: </strong> {{ $ttr->classrooms->Name_Class }}</h6></div>
            </div>
            <div class="row">
                <div class="col-md-4"><h6 class="card-title"><strong>Section: </strong> {{ $ttr->sections->Name_Section  }}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Semester: </strong> {{ $ttr->semester}}</h6></div>
                <div class="col-md-4"><h6 class="card-title"><strong>Year: </strong>Class TimeTable {{ '('.$ttr->year.')' }}</h6></div>
            </div>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Create Lecture</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="{{route('l.store',$ttr->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Subject: <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select class="select form-control" required style="height: 50px" name="subject_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($subjects as $subject)
                                            <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="teacher_id" id="teacher_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($teachers as $teacher)
                                            <option  value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="day_id" class="col-lg-3 col-form-label font-weight-semibold">Day <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="day_id" id="day_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($days as $day)
                                            <option  value="{{ $day->id }}">{{ $day->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">TimeSlot <span class="text-danger">*</span></label>
                                <div class="col-lg-9">

                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="ts_id" id="ts_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($ts as $ts)
                                            <option  value="{{ $ts->id }}">{{ $ts->full }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
        </div>

        </form>
    </div>



@endsection
