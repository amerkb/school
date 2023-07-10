@extends('layouts.master')
@section('css')
    @section('title')
        {{ 'Edit TimeSlot' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'Edit  TimeSlot' }}
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
            <h6 class="card-title">Edit TimeSlot</h6>
            {{--  {!! Qs::getPanelOptions() !!}  --}}
        </div>

        <div class="card-body">



            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="{{route('ts.update',$ts->id)}}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Start Time <span
                                            class="text-danger">*</span></label>

                                <div class="col-lg-3">
                                    <select data-placeholder="Hour" style="height: 50px" required class="select-search form-control" name="hour_from" id="hour_from">

                                        <option value=""></option>
                                        @for($t=1; $t<=12; $t++)
                                            <option {{ $ts-> hour_from== $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <select data-placeholder="Minute" style="height: 50px" required class="select-search form-control" name="min_from" id="min_from">

                                        <option value=""></option>
                                        <option {{ $ts-> min_from == 00 ? 'selected' : '' }} value="00">00</option>
                                        <option {{ $ts-> min_from == 05 ? 'selected' : '' }} value="05">05</option>
                                        @for($t=10; $t<=55; $t+=5)
                                            <option {{ $ts-> min_from == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <select data-placeholder="Meridian" style="height: 50px" required class="select form-control" name="meridian_from" id="meridian_from">

                                        <option value=""></option>
                                        <option {{ $ts-> meridian_from == 'AM' ? 'selected' : '' }} value="AM">AM
                                        </option>
                                        <option {{ $ts-> meridian_from== 'PM' ? 'selected' : '' }} value="PM">PM
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">End Time <span class="text-danger">*</span></label>

                                <div class="col-lg-3">
                                    <select data-placeholder="Hour" style="height: 50px" required class="select-search form-control" name="hour_to" id="hour_to">

                                        <option value=""></option>
                                        @for($t=1; $t<=12; $t++)
                                            <option {{ $ts-> hour_to == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <select data-placeholder="Minute" style="height: 50px" required class="select-search form-control" name="min_to" id="min_to">

                                        <option value=""></option>
                                        <option {{ $ts-> min_to == 00 ? 'selected' : '' }} value="00">00</option>
                                        <option {{ $ts-> min_to == 05 ? 'selected' : '' }} value="05">05</option>
                                        @for($t=10; $t<=55; $t+=5)
                                            <option {{ $ts-> min_to == $t ? 'selected' : '' }} value="{{ $t }}">{{ $t}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <select style="height: 50px" data-placeholder="Meridian" required class="select form-control"
                                            name="meridian_to" id="meridian_to">

                                        <option value=""></option>
                                        <option {{ $ts-> meridian_to == 'AM' ? 'selected' : '' }} value="AM">AM
                                        </option>
                                        <option {{ $ts-> meridian_to  == 'PM' ? 'selected' : '' }} value="PM">PM
                                        </option>
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
