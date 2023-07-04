@extends('layouts.master')
@section('css')

@section('title')
    Grade
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    <div class="card-body">
    <div class="row" >

        @foreach( $grades as $grade)
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-primary card-body" style="background-color: #2c3034">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-school highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">{{$grade->Name}}</h5>
                            <p class="text-white">{{$grade->Notes}}</p>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <h6 class="text-white"><a href="{{route('ru.class',$grade->id)}}">View Classes</a></h6>
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
@section('js')

@endsection
