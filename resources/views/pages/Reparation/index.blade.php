@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */--}}
@section('title')
    {{ 'Reparatio List ' }}
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
<!-- row -->


                        <div class="card-body">

                            <a href="{{ route('reparations_create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ 'Add Reparation' }}</a><br><br>


                            <br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ 'Amount' }}</th>
                                            <th>{{ 'Statement' }}</th>
                                            <th>{{ 'created ' }}</th>
                                            <th>{{ 'updated' }}</th>
                                            <th>{{ 'Processes' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
                                    @endphp
                                        <?php $i = 0; ?>
                                        @foreach ($Reparation as $Reparatio)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ number_format($Reparatio->credit) }}</td>
                                                <td>{{ $Reparatio->description }}</td>
                                                <td>{{ $Reparatio->created_at }}</td>
                                                <td>{{ $Reparatio->updated_at }}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            Pro
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item"
                                                               href="{{ route('reparations_edit', $Reparatio->id) }}"><i
                                                                        style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                 edit </a>

                                                            <a class="dropdown-item"
                                                               data-toggle="modal"
                                                               data-target="#delete_Teacher{{ $Reparatio->id }}">
                                                                <i
                                                                        style="color:red" class="fa fa-trash"></i>&nbsp;

                                                                delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Teacher{{ $Reparatio->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('reparations_destroy',$Reparatio->id) }}">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    {{ 'Delete' }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ 'Warning Grade' }}</p>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $Reparatio->id }}">
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
