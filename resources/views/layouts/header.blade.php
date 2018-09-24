<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
                {{ Html::image(asset(config('setting.images.logo'))) }}
                <span>@lang('message.courses')</span>
            </div>
        </div>
        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="{{ route('home') }}">@lang('message.home')</a></li>
                    <li class="main_nav_item"><a href="{{ route('courses.index') }}">@lang('message.courses')</a></li>
                    <li class="main_nav_item"><a href="{{ route('process') }}">@lang('message.process')</a></li>
                    <li class="main_nav_item"><a href="{{ route('profile') }}">@lang('message.profile')</a></li>
                    <li class="main_nav_item"><a href="#">@lang('message.event')</a></li>
                    <li class="main_nav_item"><a href="#">@lang('message.contact_us')</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
        @guest
            <b>
                <a class="nav-link" href="{{ route('login') }}">@lang('message.login')</a>
            </b>
            <b>
                <a class="nav-link" href="{{ route('register') }}">@lang('message.register')</a>
            </b>
        @else
            <div>
                <h3 class="nav-link">
                    @lang('message.hi', ['name' => Auth::user()->username])
                </h3>

                <b>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        @lang('message.logout')
                    </a>

                    {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                    {!! Form::close() !!}
                </b>
            </div>
        @endguest
    </div>
</header>
