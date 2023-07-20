@extends('layouts.master')
@section('css')

@section('title')
    {{ 'Study fees' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'Study fees' }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->


                        <div class="card-body">
                            <a href="{{route('createfee')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Add new fees</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>The Amount</th>
                                            <th>The Grade</th>
                                            <th>The Class</th>
                                            <th>Academic year</th>
                                            <th>Notes</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fees as $fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $fee->title }}</td>
                                                <td>{{ number_format($fee->amount) }}</td>
                                                <td>{{ $fee->grade->Name }}</td>
                                                <td>{{ $fee->classroom->Name_Class }}</td>
                                                <td>{{ $fee->year }}</td>
                                                <td>{{ $fee->description }}</td>
                                                <td>
                                                    <a href="{{ route('editfee', $fee->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Fee{{ $fee->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                            @include('pages.Fees.Delete')
                                        @endforeach
                                </table>
                            </div>
                        </div>


<!-- row closed -->
@endsection
@section('js')

@endsection
