@extends('layouts.master')
@section('css')

@section('title')
   payment for {{$Teacher->name}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    سند صرف
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

                    <form method=""  action="{{ route('Payment_store3') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المبلغ : <span class="text-danger">*</span></label>
                                    <input required class="form-control" name="Debit" type="number" >
                                    <input  type="hidden" name="user_id"  value="{{$Teacher->id}}" class="form-control">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>البيان : <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="ajax-btn" type="submit"
                                    class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                        </div>    </form>

                </div>


    <!-- row closed -->
@endsection
@section('js')


@endsection
