

@yield('css')
<!--- Style css -->
{{--<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">--}}

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
