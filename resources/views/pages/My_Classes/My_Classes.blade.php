@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}


    @section('title')
        classes list
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'title_page' }}
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ 'Add Class' }}
                    </button>

{{--                    <button type="button" class="button x-small" id="btn_delete_all">--}}
{{--                        {{ 'Delete Checkbox' }}--}}
{{--                    </button>--}}


                    <br><br>

                    <form action="{{ route('Filter_Classes') }}" method="">

                        <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                                onchange="this.form.submit()">
                            <option value="" selected disabled>{{ 'Search By Grade' }}</option>
                            @foreach ($Grades as $Grade)
                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                            @endforeach
                        </select>
                    </form>
                        <br>



                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                           onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ 'Name Class' }}</th>
                                <th>{{ 'Name Grade' }}</th>
                                <th>{{ 'Status' }}</th>
                                <th>{{ 'Processes' }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if (isset($details))
                                    <?php $List_Classes = $details; ?>
                            @else
                                    <?php $List_Classes = $My_Classes; ?>
                            @endif

                            <?php $i = 0; ?>

                            @foreach ($List_Classes as $My_Class)
                                <tr>
                                        <?php $i++; ?>
                                    <td><input type="checkbox"  value="{{ $My_Class->id }}" class="box1" ></td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $My_Class->Name_Class }}</td>
                                    <td>{{ $My_Class->Grades->Name }}</td>
                                    <td>
                                        @if ($My_Class->Status === 1)
                                            <label
                                                    class="badge badge-success">{{ 'Active' }}</label>
                                        @else
                                            <label
                                                    class="badge badge-danger">{{ 'No Active' }}</label>
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $My_Class->id }}"
                                                title="{{('Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="{{$My_Class->Status==1?"btn btn-danger btn-sm":"btn btn-success btn-sm"}}" data-toggle="modal"
                                                data-target="#delete{{ $My_Class->id }}"
                                                title="">
                                            @if ($My_Class->Status === 1)
                                                No Active
                                            @else
                                                 Active
                                            @endif
                                            </button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ 'Edit Class' }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{route('classupdate')}}" method="">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        {{-- <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ 'Name Class' }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                class="form-control"
                                                                value=""
                                                                required> --}}
                                                        <input type="hidden" name="id" value="{{ $My_Class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                               class="mr-sm-2">Name Class
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $My_Class->Name_Class }}"
                                                               name="Name_en" required>
                                                    </div>
                                            </div><br>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">{{ 'Name Grade' }}
                                                    :</label>
                                                <select class="form-control form-control-lg"
                                                        id="exampleFormControlSelect1" name="Grade_id">
                                                    <option value="{{ $My_Class->Grades->id }}">
                                                        {{ $My_Class->Grades->Name }}
                                                    </option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">
                                                            {{ $Grade->Name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ 'Close' }}</button>
                                                <button type="submit"
                                                        class="btn btn-success">{{ 'Submit' }}</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                    </div>


                    <!-- delete_modal_Grade -->
                    <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        @if ($My_Class->Status === 1)
                                             Active
                                        @else
                                          No  Active
                                        @endif
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('classdestroy')}}"
                                          method="">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        {{ 'Warning Grade' }}
                                        <input id="id" type="hidden" name="id"
                                               class="form-control" value="{{ $My_Class->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ 'Close' }}</button>
                                            <button type="submit"
                                                    class="btn btn-danger">
                                                @if ($My_Class->Status === 1)
                                                  No Active
                                                @else
                                                     Active
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




    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ 'Add Class' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{route('classstore') }}" method="">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            {{-- <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{('My_Classes_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name" />
                                            </div> --}}


                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{('Name class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ ('Name Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ 'Processes' }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                       type="button" value="{{ 'Delete row' }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                               value="{{ 'Add row' }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ 'Close' }}</button>
                                    <button type="submit" class="btn btn-success">{{ 'Submit' }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
    </div>



    <!-- حذف مجموعة صفوف -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ 'Delete Class' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route ('class_delete_all') }}" method="">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ 'Warning Grade' }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ 'Close' }}</button>
                        <button type="submit" class="btn btn-danger">{{ 'Submit' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    </div>

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });
                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>

@endsection
