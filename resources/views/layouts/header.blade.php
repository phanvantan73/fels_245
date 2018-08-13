<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
                {{ Html::image(asset('images/logo.png')) }}
                <span>{{ trans('message.courses') }}</span>
            </div>
        </div>
        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="{{ route('home') }}">{{ trans('message.home') }}</a></li>
                    <li class="main_nav_item"><a href="{{ route('courses.index') }}">{{ trans('message.courses') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.process') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.profile') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.event') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.contact_us') }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
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
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ trans('message.logout') }}
                    </a>

                    {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                    {!! Form::close() !!}
                </b>
            </div>
        @endguest
    </div>
</header>
