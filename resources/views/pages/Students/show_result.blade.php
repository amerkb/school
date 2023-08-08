@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
   result for {{$student->name}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'List Students' }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <style>


        .animated-card {
            transition: transform 0.3s 0.2s ease-in-out;
        }

        .animated-card:hover {
            transform: scale(1.05);
        }

    </style>
<!-- row -->
    @if($results->isEmpty())
        <div class="card-body" style="display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    font-size: 40px;
    font-weight: bold;">
            NO RESULTS
        </div>

    @endif
    @if($results!=null)
    <div class="card-body">

        <div class="row" >
            @foreach ($results as $result)

                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30 hover animated-card" >
                        <div class="card  card-statistics h-100">
                            <div class="{{$result->status=="successful"?"btn-success btn card-body":""}}{{$result->status=="fail"?"btn-danger  card-body":""}}
                            {{$result->status=="No exam submitted"?"btn-warning btn card-body":""}}" >
                                <div class="clearfix">
                                    <div class="float-left  ">
                                    <span class="text-white">
                                        <i class="fas fa-poll highlight-icon" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <h2 class="card-text text-white">{{$result->se->subject->name}}</h2>

                                        <h3 class="card-text text-white" > {{$result->degree}}</h3>
                                        <h4 class="card-text text-white" > {{$result->status}}</h4>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    @endforeach
        </div>

                </div>
    </div>
    @endif


<!-- row closed -->
@endsection
@section('js')

@endsection
