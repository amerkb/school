@extends('layouts.master')
@section('css')

@section('title')
   edit reparation
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
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

                            <form action="{{route('reparations_update',$FA->id)}}" method="" autocomplete="off">
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" value="{{$FA->credit}}" type="number" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>البيان : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                                  rows="3">{{$FA->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                                <div class="text-center">
                                    <button id="ajax-btn" type="submit"
                                            class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                                </div>     </form>

                </div>

    <!-- row closed -->
@endsection
@section('js')


@endsection
