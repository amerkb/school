@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
   Exams for {{ $student->name }}
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
            transition: transform 0.3s 0.1s ease-in-out;
        }

        .animated-card:hover {
            transform: scale(1.05);
        }

    </style>
<!-- row -->
    @if($quizzes->isEmpty())
        <div class="card-body" style=" display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    font-size: 40px;
    font-weight: bold;
     padding: 2.25rem;
}">
            NO RESULTS
        </div>

    @endif
    @if($quizzes!=null)
    <div class="card-body">

        <div class="row" >
            @foreach ($quizzes as $quizze)

                    <div class="col-xl-3 col-lg-6 col-md-6 mb-30 hover animated-card" >
                        <div class="card  card-statistics h-100">
                            <div class="btn-dark card-body">
                                <div class="clearfix">
                                    <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-poll highlight-icon" aria-hidden="true"></i>
                                    </span>
                                    </div>
                                    <div class="float-right text-right">
                                        <h3 class="card-text text-white">{{$quizze->name}}</h3>
                                        <h6 class="card-text text-white" > {{$quizze->year}}</h6>
                                        <h6 class="card-text text-white">{{$quizze->semester}} </h6>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <h6 class="text-white"><a href="{{route('show_dashboard_result',["id_Quizze"=>$quizze->id,
                                "id_student"=>$student->id])}}">View Results</a></h6>
                                </p>
                            </div>

                        </div>
                    </div>

                    @endforeach

                </div>
    </div>
    @endif


<!-- row closed -->
@endsection
@section('js')

@endsection
