<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script type='text/javascript' language='javascript' src='{{asset('js/default.js')}}'></script>
        <script type='text/javascript' language='javascript' src='{{asset('js/jquery-3.6.0.js')}}'></script>
        <script src = "{{asset('js/jquery-ui.js')}}"></script>

        @yield('styles')
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>
        @include('web.menu')
        @php
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
        @endphp

        @if($currentRoute !== 'home')
{{--            {{ Breadcrumbs::render() }}--}}
        @endif

        @yield('content')
        @include('web.footer')
        @yield('scripts')
    </body>
</html>
