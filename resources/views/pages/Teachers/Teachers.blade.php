@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */--}}
@section('title')
    {{ 'List Teachers' }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'List Teachers' }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    @php
        $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
    @endphp
<!-- row -->


                        <div class="card-body">
                            @if(IsManager($type) ||IsOriented($type) )
                            <a href="{{ route('createteacher') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ 'Add Teacher' }}</a><br><br>
                            @endif



                            <br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ 'Name Teacher' }}</th>
                                            <th>{{ 'Gender' }}</th>
                                            <th>{{ 'Joining Date' }}</th>
                                            <th>{{ 'Specialization' }}</th>
                                            <th>{{ 'active' }}</th>
                                            <th>{{ 'Processes' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 0; ?>
                                        @foreach ($Teachers as $Teacher)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $Teacher->Name }}</td>
                                                <td>{{ $Teacher->genders->Name }}</td>
                                                <td>{{ $Teacher->Joining_Date }}</td>
                                                <td>{{ $Teacher->specializations->Name }}</td>
                                                <td>
                                                    @if ($Teacher->status === 1)
                                                        <label
                                                                class="badge badge-success">{{ 'Active' }}</label>
                                                    @else
                                                        <label
                                                                class="badge badge-danger">{{ 'No Active' }}</label>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            Pro
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            @if(IsManager($type) || IsOriented($type))
                                                            <a class="dropdown-item"
                                                               href="{{ route('editteacher', $Teacher->id) }}"><i
                                                                        style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                 تعديل بيانات الاستاذ</a>
                                                            <a class="dropdown-item"
                                                               data-toggle="modal"
                                                               data-target="#delete_Teacher{{ $Teacher->id }}"
                                                               href="{{ route('account_statement', $Teacher->id) }}">
                                                                @if ($Teacher->status === 1)
                                                                    <i
                                                                            style="color:red"
                                                                            class="fas fa-ban"></i>&nbsp;
                                                                    <span  style="color:red">  الغاء تفعيل</span>
                                                                @endif
                                                                @if ($Teacher->status === 0)
                                                                    <i
                                                                            style="color:green"
                                                                            class="fas fa-check-circle"></i>&nbsp;
                                                                    <span  style="color:green">تفعيل</span>
                                                                @endif
                                                            </a>
                                                            @endif
                                                        @if(IsManager($type) || IsAccountant($type))
                                                                <a class="dropdown-item"
                                                                   href="{{ route('Payment_show2', $Teacher->id) }}"><i
                                                                            style="color:goldenrod"
                                                                            class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('account_statement_teacher', $Teacher->id) }}"><i
                                                                            style="color:blue"
                                                                            class="fas fa-file-invoice"></i>&nbsp; &nbsp; كشف حساب</a>
                                                            @endif
                                                             </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Teacher{{ $Teacher->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('destroyteacher') }}">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{ 'Delete Teacher' }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ 'Warning Grade' }}</p>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $Teacher->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ 'Close' }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ 'Submit' }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                </table>
                            </div>
                        </div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
