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
    @if($attendances->isEmpty())
        <div class="card-body" style="display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    font-size: 40px;
    font-weight: bold;">
            NO ABSENT
        </div>

    @endif
    @if($attendances!=null)
    <div class="card-body">
        <div class="row" >
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card  card-statistics h-100">
                    <div class="btn-primary card-body">
                        <div class="clearfix">
                            <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-calendar-times highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <h5 class="card-text text-white" style="font-weight: bold">Absent Number  :</h5>
                                <h3 class="text-white">{{$attendances->count()}}</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="row" >
            @foreach ($attendances as $attendance)

                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30 hover animated-card" >
                        <div class="card  card-statistics h-100">
                            <div class="btn-danger btn card-body" >
                                <div class="clearfix">
                                    <div class="float-left  ">
                                    <span class="text-white">
                                        <i class="fas fa-calendar-times highlight-icon" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <h2 class="card-text text-white">{{\Carbon\Carbon::createFromFormat("Y-m-d",$attendance->attendence_date)->format("D") }}</h2>

                                        <h3 class="card-text text-white" > {{$attendance->attendence_date}}</h3>
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
