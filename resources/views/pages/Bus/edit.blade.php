@extends('layouts.master')
@section('css')
    @section('title')
        {{ 'Edit Bus' }}
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
            <h6 class="card-title">Edit Bus</h6>
            {{--  {!! Qs::getPanelOptions() !!}  --}}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">Edit Bus</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="add-tt">
                    <div class="col-md-8">
                        <form class="ajax-store" method="post" action="{{route('Bus_update',$bus->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Name :<span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <input  name="name" value="{{$bus->name}}" required type="text" class="form-control" placeholder="Name of Bus">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Number : <span class="text-danger"></span></label>
                                <div class="col-lg-9">
                                    <input \ name="number" value="{{$bus->number}}" required type="text" class="form-control" placeholder="Number of Bus">
                                </div>
                            </div>


                    </div>
                </div>

                <div class="text-center">
                    <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                </div>

                </form>
            </div></div>


@endsection
