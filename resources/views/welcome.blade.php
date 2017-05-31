<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'My App') }}</title>
        <!-- Styles -->
        <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('auth/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <h1>
                    {{ config('app.name', 'My App') }}
                </h1>
            </div>
        </div>
    </body>
</html>
