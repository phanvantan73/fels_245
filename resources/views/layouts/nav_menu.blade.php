<nav  class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    {{ Html::image(asset(Auth::user()->profile->avatar), null, ['class' => 'img-circle']) }}
                </div>

            </li>
            <li>
                <a href="#">
                    <strong>{{ Auth::user()->username }}</strong>
                </a>
            </li>
            <li>
                <a href="{{ route('admincp.dashboard') }}"><i class="fa fa-dashboard "></i>@lang('message.dashboard')</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-user"></i>@lang('message.management.users')</a>
            </li>
            <li>
                <a href="{{ route('admin.courses.index') }}"><i class="fa fa-book"></i>@lang('message.management.courses')</a>
            </li>
            <li>
                <a href="{{ route('lessons.index') }}"><i class="fa fa-code"></i>@lang('message.management.lessons')</a>
            </li>
            <li>
                <a href="{{ route('words.index') }}"><i class="fa fa-adjust"></i>@lang('message.managememt.words')</a>
            </li>
            <li>
                <a href="{{ route('questions.index') }}"><i class="fa fa-question-circle"></i>@lang('message.management.questions')</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-send"></i>@lang('message.management.options')</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-file-text"></i>@lang('message.management.tests')</a>
            </li>
        </ul>
    </div>
</nav>
