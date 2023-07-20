@extends('layouts.master')
@section('css')

@section('title')
    {{ 'show account' }}
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
<!-- row -->
<div class="card-header">

    <div class="row">
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Name Student: </strong> {{$student->name }}</h6></div>
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Class: </strong> {{  $student->classroom->Name_Class }}</h6></div>
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Year  : </strong> {{$student->academic_year }}</h6></div>
    </div>
    <div class="row">
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Debit: </strong> {{number_format($fees->sum('Debit')) }}</h6></div>
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>credit: </strong> {{  number_format($fees->sum('credit')) }}</h6></div>
        <div class="col-md-4" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Account  : </strong> {{ number_format($fees->sum('Debit')-$fees->sum('credit')) }}</h6></div>
    </div>
</div>
<div class="card-body">
    @php
        $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
    @endphp
    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
               data-page-length="50" style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ ' type' }}</th>
                <th>{{ 'Debit' }}</th>
                <th>{{ 'credit' }}</th>
                <th>{{ 'statement' }}</th>
                <th>{{ 'Created' }}</th>
                <th>{{ 'Updated' }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fees as $fee)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $fee->type }}</td>
                    <td>{{ number_format($fee->Debit) }}</td>
                    <td>{{ number_format($fee->credit) }}</td>
                    <td>{{ $fee->description }}</td>
                    <td>{{ $fee->created_at }}</td>
                    <td>{{ $fee->updated_at }}</td>

                   </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@endsection
