@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/ --}}
@section('title')
  Add Result
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

    <div class="card">


        <div class="card-body">

            <form method="post" action="{{ route('ur.store.update',$id_se) }}">

                @csrf
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                       style="text-align: center">
                    <thead>
                    <tr>
                        <th class="alert-success">#</th>
                        <th class="alert-success">{{ ('Name') }}</th>
                        <th class="alert-success">{{ ('academic year') }}</th>
                        <th class="alert-success">{{ ('Gender') }}</th>
                        <th class="alert-success">{{ ('Grade') }}</th>
                        <th class="alert-success">{{ ('Classrooms') }}</th>
                        <th class="alert-success">{{ ('Section') }}</th>
                        <th class="alert-success">{{ ('degree') }}</th>
                        <th class="alert-success">{{ ('status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->academic_year }}</td>
                            <td>{{ $student->gender->Name }}</td>
                            <td>{{ $student->grade->Name }}</td>
                            <td>{{ $student->classroom->Name_Class }}</td>
                            <td>{{ $student->section->Name_Section }}</td>

                            @php
                                $i = 0;
                            @endphp

                                @foreach($results as $result)
                                    @if($result->student_id ==$student->id )
                                    @php
                                        $i = 1;
                                    @endphp
                                    <td>
                                <input required type="number"  min="0" max="100" name="degree_id[{{ $student->id }}]"
                                       value="{{$result->degree}}">

                                    @endif


                                @endforeach
                            @if($i==0 )
                                <td>
                                    <input required type="number"  min="0" max="100" name="degree_id[{{ $student->id }}]">
                                    @endif

                                {{--
                                {{--                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">--}}
                                <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                            </td>
                                @php
                                    $q = 0;
                                @endphp
                                    @foreach($results as $result)
                                        @if($result->student_id ==$student->id )
                                        @php
                                            $q = 1;
                                        @endphp
                            <td>
                            <select required class="custom-select my-1 mr-sm-2" value=""  name="status_id[{{ $student->id }}]">

                                <option {{ $result->status == "successful" ? 'selected' : '' }}  >successful</option>
                                <option {{ $result->status == "fail" ? 'selected' : '' }}   >fail</option>
                                <option {{ $result->status == "No exam submitted" ? 'selected' : '' }}   >No exam submitted </option>
                            </select>

                            </td>
                                        @endif
                                    @endforeach
                                @if($q==0)
                                    <td>
                                        <select required class="custom-select my-1 mr-sm-2" value=""  name="status_id[{{ $student->id }}]">
                                            <option  >successful</option>
                                            <option  >fail</option>
                                            <option >No exam submitted </option>
                                        </select>

                                    </td>
                                @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-success">Submit form <i class="fas fa-paper-plane"></i></button>
                </div>
            </form><br>
        </div></div>
@endsection
@section('js')
{{--    @toastr_js--}}
{{--    @toastr_render--}}
@endsection
