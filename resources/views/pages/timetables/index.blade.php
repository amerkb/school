@extends('layouts.master')
@section('css')
@section('title')
    {{ 'Add TimeTable' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'Add TimeTable' }}
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
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage TimeTables</h6>
            {{--  {!! Qs::getPanelOptions() !!}  --}}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Create Timetable</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="{{route('time_create')}}">
                            @csrf
                                     <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name of TimeTable">
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="Grade_id">{{('Grade')}} : <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <select class="select form-control" required style="height: 50px" name="Grade_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        @foreach($grades as $c)
                                            <option  value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Classroom_id" class="col-lg-3 col-form-label font-weight-semibold">Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="Classroom_id" id="Classroom_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="section_id" class="col-lg-3 col-form-label font-weight-semibold">Section <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        
                                        <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="section_id" id="section_id">
                                            <option selected disabled>{{('Choose')}}...</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold">Year <span class="text-danger">*</span></label>
                                <div class="col-lg-9">

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
                            </div>
                            <div class="form-group row">
                                <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold">Semester <span class="text-danger">*</span></label>
                                <div class="col-lg-9">

                                    <select required data-placeholder="Select Class"style="height: 50px"  class="form-control select" name="semester_id" id="semester_id">
                                        <option selected disabled>{{('Choose')}}...</option>
                                        <option  value= 1 > the first semester </option>
                                        <option value= 2 > the second semester </option>
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
