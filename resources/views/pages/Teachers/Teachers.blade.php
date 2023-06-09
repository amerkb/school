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
<!-- row -->


                        <div class="card-body">
                            <a href="{{ route('createteacher') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ 'Add Teacher' }}</a><br><br>
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
                                                    <a href="{{ route('editteacher',$Teacher->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_Teacher{{ $Teacher->id }}"
                                                        title="{{ 'Delete' }}"><i
                                                            class="fa fa-trash"></i></button>
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
