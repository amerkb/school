<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login-form-07/fonts/icomoon/style.css">

    <link rel="stylesheet" href="login-form-07/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login-form-07/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="login-form-07/css/style.css">


    <title>Login</title>

    <title>Login </title>

  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="login-form-07/images/undraw_remotely.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4"></p>
            </div>
            <form action="{{ route('check.login') }}" method="post">
                @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="email">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">

              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-success">

            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="login-form-07/js/jquery-3.3.1.min.js"></script>
    <script src="login-form-07/js/popper.min.js"></script>
    <script src="login-form-07/js/bootstrap.min.js"></script>
    <script src="login-form-07/js/main.js"></script>

        <!-- jquery -->
        <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
        <!-- plugins-jquery -->
        <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
        <!-- plugin_path -->
        <script>
            var plugin_path = 'js/';
        </script>

        <!-- chart -->
        <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
        <!-- calendar -->
        <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
        <!-- charts sparkline -->
        <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
        <!-- charts morris -->
        <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
        <!-- sweetalert2 -->
        <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
        <!-- toastr -->
        @yield('js')
        <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
        <!-- validation -->
        <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
        <!-- lobilist -->
        <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
        <!-- custom -->
        <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

  </body>
</html>