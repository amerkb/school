@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}

@section('title')
   Exam
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ 'title_page' }}: الحضور والغياب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($exams as $exam)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $exam->name }}({{$exam->year}})</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th> Subject</th>
                                                                    <th>date</th>
                                                                    <th>time</th>
                                                                    <th>{{ 'Processes' }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($exam->se->filter(function ($result) use($id_class) {
                                                                 return $result->classroom_id==$id_class;}) as $se)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $se->subject->name }}</td>
                                                                        <td>{{ $se->date }}</td>
                                                                        <td>{{ $se->timeslot->full }} </td>
                                                                        <td>
                                                                            <a href="{{ route('Result_show',['id' => $id_section, 'year' => $se->quizze->year,'se' => $se->id]) }}"
                                                                                class="btn btn-warning btn-sm"
                                                                                role="button" aria-pressed="true">Student List</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

<!-- row closed -->
@endsection
@section('js')
{{--@toastr_js--}}
{{--@toastr_render--}}
<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Class_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

@endsection
