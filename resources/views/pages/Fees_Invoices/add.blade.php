@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
   add fees for {{ $student->name }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة فاتورة جديدة {{ $student->name }}
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

                <form class=" row mb-30" action="{{ route('Invoices_store') }}" method="">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Fees">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">Student Name</label>
                                            <select class="fancyselect" name="student_id" required>
                                                <option selected value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">Fee Type</label>
                                            <div class="box">
                                                <select class="fancyselect" name="fee_id" required>
                                                    <option value="">-- choose --</option>
                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->id }}">{{ $fee->title }}({{$fee->amount}})</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>



                                        <div class="col">
                                            <label for="description" class="mr-sm-2">Statement</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en" class="mr-sm-2">{{ 'Processes' }}:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="{{ 'Delete row' }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button"
                                        value="{{ 'Add row' }}" />
                                </div>
                            </div><br>
                            <input type="hidden" name="Grade_id" value="{{ $student->Grade_id }}">
                            <input type="hidden" name="Classroom_id" value="{{ $student->Classroom_id }}">
                            <div class="text-center">
                                <button id="ajax-btn" type="submit"
                                        class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


<!-- row closed -->
@endsection
@section('js')


@endsection
