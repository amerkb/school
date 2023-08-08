@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
    Grade list
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->



    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif




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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Grades Add') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ ('Name') }}</th>
                                <th>{{ ('Notes') }}</th>
                                <th>{{ ('status') }}</th>
                                <th>{{ ('Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Grades as $Grade)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Grade->Name }}</td>
                                    <td>{{ $Grade->Notes }}</td>
                                    <td>
                                        @if ($Grade->Status === 1)
                                            <label
                                                    class="badge badge-success">{{ 'Active' }}</label>
                                        @else
                                            <label
                                                    class="badge badge-danger">{{ 'No Active' }}</label>
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Grade->id }}"
                                            title="{{ ('Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        @if ($Grade->Status === 1)
                                            <a href="#"
                                               class="btn btn-outline-danger btn-sm"
                                               data-toggle="modal"
                                               data-target="#delete{{ $Grade->id }}">{{ 'Un Active' }}</a>
                                        @else
                                            <a href="#"
                                               class="btn btn-outline-success btn-sm"
                                               data-toggle="modal"
                                               data-target="#delete{{ $Grade->id }}">{{ 'Active' }}</a>
                                        @endif

                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{('Edit Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('date', 'test') }}" method="">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{('Name') }}
                                                            :</label>
                                                            <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $Grade->Name }}" required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Grade->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{('Notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $Grade->Notes }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ ('Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ ('submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    @if ($Grade->Status === 1)
                                                        Active
                                                    @else
                                                        No Active
                                                    @endif
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="{{ route('destroy', 'test') }}" method="">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{('Warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{('Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">
                                                        @if ($Grade->Status === 1)
                                                           Active
                                                        @else
                                                            No Active
                                                        @endif</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>


    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{('Grades Add') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('storeGrade') }}" method="">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ 'Name' }}
                                    :</label>
                                <input type="text" class="form-control" name="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ 'Notes' }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ 'Close' }}</button>
                    <button type="submit" class="btn btn-success">{{ 'submit' }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>



<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
