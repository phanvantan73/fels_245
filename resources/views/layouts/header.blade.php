<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
                {{ Html::image('') }}
                <span>{{ trans('message.courses') }}</span>
            </div>
        </div>
        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="#">{{ trans('message.home') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.about_us') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.courses') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.event') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.news') }}</a></li>
                    <li class="main_nav_item"><a href="#">{{ trans('message.contact_us') }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
        {{ Html::image('') }}
        <span>{{ trans('message.our_phone_number') }}</span>
    </div>
</header>
