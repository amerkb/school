@extends('layouts.master')
@section('css')

@section('title')
   Parent List
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Add_Parent')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @livewire('add-parent');
            </div>
        </div>
    </div>

<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
