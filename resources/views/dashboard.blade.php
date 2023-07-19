<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link href="{{asset('startbootstrap-sb-admin-gh-pages/css/styles.css')}}" rel="stylesheet" />

    <title>Dashboard</title>
    @include('layouts.head')
    @livewireStyles

        <link rel="icon" type="image/png" href="path/to/my-icon.png">

</head>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: black">

    <!-- Navbar Brand-->
        <i style="font-size: 30px;color: white" class="fa fa-university" ></i>
    <h1 style="font-size: 25px ; font-weight: bold" class="navbar-brand ps-3" href="#">
        Name School
       </h1>


    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <a class="navbar-brand ps-3" style=" padding-left: 180px; font-size: 18px;
    font-weight: bold" href="#">
            {{ \App\Models\Type_User::where(
        "id",auth()->user()->type_id)->pluck("type")[0]}}  Dashboard</a>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
               id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a  class="dropdown-item" href="{{route("logout")}}">  Logout  <i  class="fa fa-sign-out" style="
                 color: red ; padding-left: 40px "></i></a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    @include('layouts.main-sidebar')
    @php
        $type=  \App\Models\Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0];
    @endphp

        @if(IsManager($type)|| IsOriented($type))

    <div id="layoutSidenav_content">


        <div class="content-wrapper" style="margin: 0px">
            <div class="page-title" >
                <div class="row">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row" >
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-primary card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Students Number :</h5>
                                    <h4 class="text-white">{{\App\Models\Student::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"><a href="{{route('index')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-warning card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Teacher Number :</h5>
                                    <h4 class="text-white">{{\App\Models\Teacher::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('teacher')}}">View Details</a> </h6>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-danger card-body" style="background-color: green">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Parent Number :</h5>
                                    <h4 class="text-white">{{\App\Models\MyParent::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"><a href="{{route('add_parent')}}" >View Details</a> </h6>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-dark card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Section Number:</h5>
                                    <h4 class="text-white">{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('section')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-info card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">User Number:</h5>
                                    <h4 class="text-white">{{\App\Models\User::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('ori_index')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-danger card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Manager Number:</h5>
                                    <h4 class="text-white">{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('section')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-warning card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Oriented Number:</h5>
                                    <h4 class="text-white">{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('section')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card  card-statistics h-100">
                        <div class="btn-secondary card-body">
                            <div class="clearfix">
                                <div class="float-left ">
                                    <span class="text-white">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h5 class="card-text text-white">Fees Number:</h5>
                                    <h4 class="text-white">{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <h6 class="text-white"> <a href="{{route('section')}}">View Details</a></h6>
                            </p>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row">

                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">The last operations on the system</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true"> Students</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                   role="tab" aria-controls="teachers" aria-selected="false">Teachers
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false"> Parents
                                                </a>
                                            </li>
                                            @if(IsManager($type))
                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                 role="tab" aria-controls="fee_invoices" aria-selected="false">Fees
                                        </a>
                                                </li>
                                                    @endif
</ul>
</div>
</div>
<div class="tab-content" id="myTabContent">

{{--students Table--}}
<div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
<div class="table-responsive mt-15">
  <table style="text-align: center" class="table center-aligned-table  mb-0">
      <thead>
      <tr  class="table-info text-danger">
          <th>#</th>
          <th>name  </th>
          <th>email </th>
          <th>gender</th>
          <th> grade</th>
          <th>class </th>
          <th>section</th>
          <th>تاريخ الاضافة</th>
      </tr>
      </thead>
      <tbody>
      @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$student->name}}</td>
              <td>{{$student->email}}</td>
              <td>{{$student->gender->Name}}</td>
              <td>{{$student->grade->Name}}</td>
              <td>{{$student->classroom->Name_Class}}</td>
              <td>{{$student->section->Name_Section}}</td>
              <td class="text-success">{{$student->created_at}}</td>
              @empty
                  <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
          </tr>
      @endforelse
      </tbody>
  </table>
</div>
</div>

{{--teachers Table--}}
<div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
<div class="table-responsive mt-15">
  <table style="text-align: center" class="table center-aligned-table  mb-0">
      <thead>
      <tr  class="table-info text-danger">
          <th>#</th>
          <th>اسم المعلم</th>
          <th>النوع</th>
          <th>تاريخ التعين</th>
          <th>التخصص</th>
          <th>تاريخ الاضافة</th>
      </tr>
      </thead>

      @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
          <tbody>
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$teacher->Name}}</td>
              <td>{{$teacher->genders->Name}}</td>
              <td>{{$teacher->Joining_Date}}</td>
              <td>{{$teacher->specializations->Name}}</td>
              <td class="text-success">{{$teacher->created_at}}</td>
              @empty
                  <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
          </tr>
          </tbody>
      @endforelse
  </table>
</div>
</div>

{{--parents Table--}}
<div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
<div class="table-responsive mt-15">
  <table style="text-align: center" class="table center-aligned-table  mb-0">
      <thead>
      <tr  class="table-info text-danger">
          <th>#</th>
          <th>اسم ولي الامر</th>
          <th>البريد الالكتروني</th>
          <th>رقم الهوية</th>
          <th>رقم الهاتف</th>
          <th>تاريخ الاضافة</th>
      </tr>
      </thead>
      <tbody>
      @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$parent->Name_Father}}</td>
              <td>{{$parent->email}}</td>
              <td>{{$parent->National_ID_Father}}</td>
              <td>{{$parent->Phone_Father}}</td>
              <td class="text-success">{{$parent->created_at}}</td>
              @empty
                  <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
          </tr>
      @endforelse
      </tbody>
  </table>
</div>
</div>

{{--sections Table--}}
<div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
<div class="table-responsive mt-15">
  <table style="text-align: center" class="table center-aligned-table mb-0">
      <thead>
      <tr  class="table-info text-danger">
          <th>#</th>
          <th>تاريخ الفاتورة</th>
          <th>اسم الطالب</th>
          <th>المرحلة الدراسية</th>
          <th>الصف الدراسي</th>
          <th>القسم</th>
          <th>نوع الرسوم</th>
          <th>المبلغ</th>
          <th>تاريخ الاضافة</th>
      </tr>
      </thead>
      <tbody>
      @forelse(\App\Models\FeeInvoices::latest()->take(10)->get() as $section)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$section->invoice_date}}</td>
              {{-- <td>{{$section->My_classs->Name_Class}}</td> --}}
              <td class="text-success">{{$section->created_at}}</td>
          </tr>
      @empty
          <tr>
              <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
          </tr>
      @endforelse
      </tbody>
  </table>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>

<livewire:calendar />





</div>
</div>
@endif
@if(IsLibrarian($type))

<div id="layoutSidenav_content">


<div class="content-wrapper" style="margin: 0px">
<div class="page-title" >
<div class="row">
<div class="container-fluid px-4">
<h1 class="mt-4">Dashboard</h1>
<div class="col-sm-6">
<ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
</ol>
</div>
</div>
</div>
<!-- widgets -->
<div class="row"  >
<div class="col-xl-4 col-lg-6 col-md-6 mb-30">
<div class="card  card-statistics h-100">
<div class="btn-primary card-body">
<div class="clearfix">
  <div class="float-left ">
<span class="text-white">
<i class="fas fa-book highlight-icon" aria-hidden="true"></i>
</span>
  </div>
  <div class="float-right text-right">
      <h5 class="card-text text-white">Curriculum Number :</h5>
      <h4 class="text-white">{{\App\Models\Library::count()}}</h4>
  </div>
</div>
<p class="text-muted pt-3 mb-0 mt-2 border-top">
<h6 class="text-white"><a href="{{route('Lib_index')}}">View Details</a></h6>
</p>
</div>

</div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 mb-30">
<div class="card  card-statistics h-100">
<div class="btn-danger card-body" style="background-color: green">
<div class="clearfix">
  <div class="float-left ">
<span class="text-white">
<i class="fas fa-book highlight-icon" aria-hidden="true"></i>
</span>
  </div>
  <div class="float-right text-right">
      <h5 class="card-text text-white">Book Number :</h5>
      <h4 class="text-white">{{\App\Models\Book::count()}}</h4>
  </div>
</div>
<p class="text-muted pt-3 mb-0 mt-2 border-top">
<h6 class="text-white"><a href="{{route('book_index')}}" >View Details</a> </h6>
</p>
</div>

</div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 mb-30">
<div class="card  card-statistics h-100">
<div class="btn-dark card-body">
<div class="clearfix">
  <div class="float-left ">
<span class="text-white">
<i class="fas fa-book highlight-icon" aria-hidden="true"></i>
</span>
  </div>
  <div class="float-right text-right">
      <h5 class="card-text text-white">Question Number:</h5>
      <h4 class="text-white">{{\App\Models\Question_libraries::count()}}</h4>
  </div>
</div>
<p class="text-muted pt-3 mb-0 mt-2 border-top">
<h6 class="text-white"> <a href="{{route('Questionli_index')}}">View Details</a></h6>
</p>
</div>

</div>
</div>
</div>


<div class="row">

<div  style="height: 400px;" class="col-xl-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="tab nav-border" style="position: relative;">
  <div class="d-block d-md-flex justify-content-between">
      <div class="d-block w-100">
          <h5 style="font-family: 'Cairo', sans-serif" class="card-title">The last operations on the system</h5>
      </div>
      <div class="d-block d-md-flex nav-tabs-custom">
          <ul class="nav nav-tabs" id="myTab" role="tablist">

              <li class="nav-item">
                  <a class="nav-link active show" id="students-tab" data-toggle="tab"
                     href="#students" role="tab" aria-controls="students"
                     aria-selected="true"> curriculum</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                     role="tab" aria-controls="teachers" aria-selected="false">Book
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                     role="tab" aria-controls="parents" aria-selected="false"> Question
                  </a>
              </li>


          </ul>
      </div>
  </div>
  <div class="tab-content" id="myTabContent">

      {{--students Table--}}
      <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
          <div class="table-responsive mt-15">
              <table style="text-align: center" class="table center-aligned-table  mb-0">
                  <thead>
                  <tr  class="table-info text-danger">
                      <th>#</th>
                      <th>name  </th>
                      <th>year </th>
                      <th> grade</th>
                      <th>class </th>
                      <th>subject</th>
                      <th>created at </th>
                      <th> Download </th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse(\App\Models\Library::latest()->take(10)->get() as $student)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$student->title}}</td>
                          <td>{{$student->year}}</td>
                          <td>{{$student->grade->Name }}</td>
                          <td>{{$student->classroom->Name_Class}}</td>
                          <td>{{$student->subject->name}}</td>
                          <td class="text-success">{{$student->created_at}}</td>
                          <td>   <a href="{{route('Lib_download',$student->file_name)}}" title="download "
                                    class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fas fa-download">

                                  </i></a></td>

                      @empty
                              <td class="alert-danger" colspan="8"> NO DATA</td>
                      </tr>
                  @endforelse
                  </tbody>
              </table>
          </div>
      </div>

      {{--teachers Table--}}
      <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
          <div class="table-responsive mt-15">
              <table style="text-align: center" class="table center-aligned-table  mb-0">
                  <thead>
                  <tr  class="table-info text-danger">
                      <th>#</th>
                      <th>name </th>
                      <th>Category</th>
                      <th> created at</th>
                      <th> Download </th>
                  </tr>
                  </thead>

                  @forelse(\App\Models\Book::latest()->take(10)->get() as $teacher)
                      <tbody>
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$teacher->title}}</td>
                          <td>{{$teacher->category->name}}</td>
                          <td class="text-success">{{$teacher->created_at}}</td>
                          <td><a href="{{route('book_download',$teacher->file_name)}}" title="Download"
                                 class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fas fa-download">

                                  </i></a></td>

                      @empty
                              <td class="alert-danger" colspan="8">NO DATA </td>
                      </tr>
                      </tbody>
                  @endforelse
              </table>
          </div>
      </div>

      {{--parents Table--}}
      <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
          <div class="table-responsive mt-15">
              <table style="text-align: center" class="table center-aligned-table  mb-0">
                  <thead>
                  <tr  class="table-info text-danger">
                      <th>#</th>
                      <th>name</th>
                      <th> grade</th>
                      <th> class </th>
                      <th> quizze </th>
                      <th> subject </th>
                      <th> created at</th>
                      <th> Download </th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse(\App\Models\Question_libraries::latest()->take(10)->get() as $parent)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$parent->title}}</td>
                          <td>{{$parent->grade->Name }}</td>
                          <td>{{$parent->classroom->Name_Class}}</td>
                          <td>{{$parent->quizze->name}}</td>
                          <td>{{$parent->se->subject->name}}</td>
                          <td class="text-success">{{$parent->created_at}}</td>
                          <td>    <a href="{{route('Questionli_download',$parent->file_name)}}" title="Download " class="btn btn-success btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                          </td> @empty
                              <td class="alert-danger" colspan="8"> NO DATA</td>
                      </tr>
                  @endforelse
                  </tbody>
              </table>
          </div>
      </div>

      {{--sections Table--}}
      <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
          <div class="table-responsive mt-15">
              <table style="text-align: center" class="table center-aligned-table  mb-0">
                  <thead>
                  <tr  class="table-info text-danger">
                      <th>#</th>
                      <th>تاريخ الفاتورة</th>
                      <th>اسم الطالب</th>
                      <th>المرحلة الدراسية</th>
                      <th>الصف الدراسي</th>
                      <th>القسم</th>
                      <th>نوع الرسوم</th>
                      <th>المبلغ</th>
                      <th>تاريخ الاضافة</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse(\App\Models\FeeInvoices::latest()->take(10)->get() as $section)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$section->invoice_date}}</td>
                          {{-- <td>{{$section->My_classs->Name_Class}}</td> --}}
                          <td class="text-success">{{$section->created_at}}</td>
                      </tr>
                  @empty
                      <tr>
                          <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                      </tr>
                  @endforelse
                  </tbody>
              </table>
          </div>
      </div>

  </div>

</div>
</div>
</div>
</div>
</div>






</div>
</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

</body>
</html>
@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')
