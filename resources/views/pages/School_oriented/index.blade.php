@extends('layouts.master')
@section('css')

    @section('title')
        {{ 'List Users' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'List Users' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="card-body">
    <div class="row" >
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-primary card-body">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">Manager Number :</h5>
                            <h4 class="text-white">{{\App\Models\User::where("type_id",5)->count()}}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-warning card-body">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">Oriented Number :</h5>
                            <h4 class="text-white">{{\App\Models\User::where("type_id",1)->count()}}</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-danger card-body" style="background-color: green">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">Accountant Number :</h5>
                            <h4 class="text-white">{{\App\Models\User::where("type_id",3)->count()}}</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-dark card-body">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-drivers-license highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">Driver Number:</h5>
                            <h4 class="text-white">{{\App\Models\User::where("type_id",3)->count()}}</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
            <div class="card  card-statistics h-100">
                <div class="btn-danger card-body">
                    <div class="clearfix">
                        <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-user highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <h5 class="card-text text-white">librarian Number:</h5>
                            <h4 class="text-white">{{\App\Models\User::where("type_id",4)->count()}}</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>

                <a href="{{ route('ori_create') }}" class="btn btn-success btn-sm" role="button"
                   aria-pressed="true">{{ 'Add New User' }}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ 'Name User' }}</th>
                            <th>{{ 'Gender' }}</th>
                            <th>{{ 'Joining Date' }}</th>
                            <th>{{ 'Status' }}</th>
                            <th>{{ 'Type' }}</th>
                            <th>{{ 'Processes' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Oriented as $Teacher)
                            <tr>
                                    <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Teacher->name }}</td>
                                <td>{{ $Teacher->genders->Name }}</td>
                                <td>{{ $Teacher->Joining_Date }}</td>
                                <td>
                                    @if ($Teacher->Status === 1)
                                        <label class="badge badge-danger">{{ 'No Active' }}</label>
                                    @else
                                        <label class="badge badge-success">{{ 'Active' }}</label>
                                    @endif

                                </td>
                                <td>{{ $Teacher->type_user->type }}</td>
                                <td>
                                    <a href="{{ route('ori_edit', $Teacher->id) }}" class="btn btn-info btn-sm"
                                       role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_Teacher{{ $Teacher->id }}"
                                            title="{{ 'Delete' }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="delete_Teacher{{ $Teacher->id }}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('ori_destroy') }}">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ 'Delete Teacher' }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p> {{ 'Warning Grade' }}</p>
                                                <input type="hidden" name="id" value="{{ $Teacher->id }}">
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

@endsection