@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الحضور والغياب للطلاب
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الحضور والغياب للطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif



    <h5 style="font-family: 'Cairo', sans-serif;color: rgb(0, 255, 94)"> Today's Date: {{ date('Y-m-d') }}</h5>
    <form method="" action="{{ route('Result_store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
               <div>
                <form action="" method="">
                    @csrf
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{('Exam type :')}}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id" required>
                                <option selected disabled>{{('Choose')}}...</option>

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{('Subject Name')}} : <span
                                    class="text-danger"></span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id" required>

                            </select>
                        </div>

                            </select>
                        </div>

                    </div>

                </form>
               </div>
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ ('Name') }}</th>
                <th class="alert-success">{{ ('Email') }}</th>
                {{-- <th class="alert-success">{{ ('Gender') }}</th> --}}
                {{-- <th class="alert-success">{{ ('Exam type') }}</th> --}}
                {{-- <th class="alert-success">{{ ('Subject Name') }}</th> --}}
                <th class="alert-success">{{ ('Degree') }}</th>
                <th class="alert-success">{{ ('Processes') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    {{-- <td>{{ $student->gender->Name }}</td> --}}
                    {{-- <td></td> --}}
                    <td><input type="number" name="" id=""></td>
                    <td>
                        <a {{-- href="{{ route('editteacher', $Teacher->id) }}" --}}
                            class="btn btn-info btn-sm" role="button"
                            aria-pressed="true"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm"
                            data-toggle="modal"
                            {{-- data-target="#delete_Teacher{{ $Teacher->id }}" --}}
                            title="{{ 'Delete' }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ ('Submit') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
