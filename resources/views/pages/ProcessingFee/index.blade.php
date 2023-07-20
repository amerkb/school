@extends('layouts.master')
@section('css')

@section('title')
     excluding list

@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
  معالجات الرسوم الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ProcessingFees as $ProcessingFee)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$ProcessingFee->student->name}}</td>
                                            <td>{{ number_format($ProcessingFee->amount) }}</td>
                                            <td>{{$ProcessingFee->description}}</td>
                                                <td>
                                                    <a href="{{route('Process_edit',$ProcessingFee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$ProcessingFee->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.ProcessingFee.Delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>


    <!-- row closed -->
@endsection
@section('js')

@endsection
