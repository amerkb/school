@extends('layouts.master')
@section('css')
{{--    /*@toastr_css */ --}}
@section('title')
    book list
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الكتب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->



                            <div class="card-body">
                                <a href="{{url('book_create')}}"  class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">  Add Book</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> name</th>
                                            <th>category </th>
                                            <th>action </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->category->name}}</td>

                                                <td>
                                                    <a href="{{route('book_download',$book->file_name)}}" title="تحميل الكتاب" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                                                    <a href="{{route('book_edit',$book->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $book->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @include('pages.book.destroy')
                                        @endforeach
                                    </table>
                                </div>
                            </div>


  
    <!-- row closed -->
@endsection
@section('js')
{{--    @toastr_js--}}
{{--    @toastr_render--}}
@endsection
