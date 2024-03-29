@extends('layouts.master')
@section('css')

@section('title')
    Add excluding
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    استبعاد رسوم{{$student->name}}
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

                    <form method=""  action="{{ route('Process_store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المبلغ : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Debit" type="number" >
                                    <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@if($student->student_account->sum('Debit') -
                                    $student->student_account->sum('credit')>=0 )
                                            Debit for school
                                        @endif
                                        @if($student->student_account->sum('Debit') -
                                        $student->student_account->sum('credit')<0 )
                                            credit for school
                                        @endif</label>
                                    <input  class="form-control" name="final_balance" value="{{ number_format($student->student_account->sum('Debit') - 
                                    $student->student_account->sum('credit')) }}" type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>البيان : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="ajax-btn" type="submit"
                                    class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                        </div>   </form>

                </div>


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
