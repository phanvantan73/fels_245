<nav class="navbar navbar-default navbar-cls-top nav_top_del_line" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admincp.dashboard') }}">
            @lang('message.admin_cp')
        </a>
    </div>

    <div class="notifications-wrapper">
        <ul class="nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-tasks fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-plus"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="#">
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admincp.logout') }}">
                            <i class="fa fa-sign-out"></i>
                            @lang('message.logout')
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
