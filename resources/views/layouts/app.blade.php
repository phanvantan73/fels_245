<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('message.title') }}</title>

    <!-- Scripts -->
    {{ Html::script(asset('js/app.js')) }}

    <!-- Styles -->
    {{ Html::style(asset('css/app.css')) }}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <h1>
                <a class="nav-link" href="{{ url('/') }}">
                    {{ trans('message.title') }}
                </a>
                </h1>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <b>
                                <a class="nav-link" href="{{ route('login') }}">{{ trans('message.login') }}</a>
                            </b>
                            <b>
                                <a class="nav-link" href="{{ route('register') }}">{{ trans('message.register') }}</a>
                            </b>
                        @else
                            <div>
                                <h3 class="nav-link">
                                    {{ trans('message.hi') }} {{ Auth::user()->username }}
                                </h3>

                                <b>
                                    <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ trans('message.logout') }}
                                    </a>

                                    {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                                    {!! Form::close() !!}
                                </b>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
