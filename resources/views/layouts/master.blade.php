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
    <link href="{{asset('startbootstrap-sb-admin-gh-pages/css/styles.css')}}" rel="stylesheet" />
    <title> @yield('title')</title>
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
                 color: red ; padding-left: 40px "></i></a></li>     </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
    @include('layouts.main-sidebar')
    @include('layouts.main-sidebar')
    <div id="layoutSidenav_content">


        @yield('content')


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
@include('layouts.footer-scripts')
</body>
</html>
