@extends('layouts.master')
@section('css')

@section('title')
    سندات الصرف
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   سندات الصرف
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
                                            <th>النوع</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment_students as $payment_student)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$payment_student->student->name}}</td>
                                                <td>student</td>
                                            <td>{{ number_format($payment_student->amount) }}</td>
                                            <td>{{$payment_student->description}}</td>
                                                <td>
                                                    <a href="{{route('Payment_edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Payment.Delete')
                                        @endforeach
                                        @foreach($payment_teachers as $payment_student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$payment_student->teacher->Name}}</td>
                                                <td>teacher</td>
                                                <td>{{ number_format($payment_student->amount) }}</td>
                                                <td>{{$payment_student->description}}</td>
                                                <td>
                                                    <a href="{{route('Payment_edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Payment.Delete')
                                        @endforeach
                                        @foreach($payment_user as $payment_student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$payment_student->user->name}}</td>
                                                <td>{{$payment_student->user->type_user->type}}</td>
                                                <td>{{ number_format($payment_student->amount) }}</td>
                                                <td>{{$payment_student->description}}</td>
                                                <td>
                                                    <a href="{{route('Payment_edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Payment.Delete')
                                        @endforeach
                                    </table>

                                </div>
                            </div>


    <!-- row closed -->
@endsection
@section('js')

@endsection
