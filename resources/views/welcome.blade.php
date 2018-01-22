<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('css/'.$css.'.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ url('js/lib/jquery-3.3.1.min.js') }}" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>pu
            @endif
            @include('side_menu')
            @include($content)
        </div>
    </body>
</html>
