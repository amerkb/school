@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */--}}
@section('title')
      edit invoices
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل رسوم دراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('Invoices_update','test')}}" method="" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">اسم الطالب</label>
                                <input type="text" value="{{$fee_invoices->student->name}}" readonly name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee_invoices->id}}" name="id" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">المبلغ</label>
                                <input type="number" value="{{$fee_invoices->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputZip">نوع الرسوم</label>
                                <select class="custom-select mr-sm-2" name="fee_id">
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}" {{$fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">ملاحظات</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee_invoices->description}}</textarea>
                        </div>
                        <br>
                        <div class="text-center">
                            <button id="ajax-btn" type="submit"
                                    class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>

                </div>


    <!-- row closed -->
@endsection
@section('js')

@endsection
