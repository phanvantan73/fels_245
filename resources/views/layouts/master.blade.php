<!DOCTYPE html>
<html lang="">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Author Meta -->
        <meta name="author" content="jakelagger">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Site Title -->
        <title>{{ trans('message.title') }}</title>

        <!-- CSS -->
        @section('css')
            {{ Html::style('styles/bootstrap4/bootstrap.min.css') }}
            {{ Html::style('plugins/fontawesome-free-5.0.1/fontawesome-all.css') }}
            {{ Html::style('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}
            {{ Html::style('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}
            {{ Html::style('plugins/OwlCarousel2-2.2.1/animate.css') }}
            {{ Html::style('styles/main_styles.css') }}
            {{ Html::style('styles/responsive.css') }}
        @show
    </head>
    <body>
        <!-- Super Container -->
        <div class="super_container">
            <!-- Header -->
            @include('layouts.header')
            <!-- Home -->
            <div class="home">
                <!-- Hero Slider -->
                @yield('home')
            </div>

            <div class="hero_boxes">
                <div class="hero_boxes_inner">
                    <div class="container">
                        <!-- Hero boxes -->
                        @yield('hero_boxes')
                    </div>
                </div>
            </div>
            <!-- Courses -->
            <div class="popular page_section">
                @yield('course_boxes')
            </div>
            <!-- Events -->
            <div class="events page_section">
                @yield('events')
            </div>
            <!-- Footer -->
            @include('layouts.footer')
        </div>

        <!-- JS -->
        @section('js')
        {{ Html::script('js/jquery-3.2.1.min.js') }}
        {{ Html::script('styles/bootstrap4/popper.js') }}
        {{ Html::script('styles/bootstrap4/bootstrap.min.js') }}
        {{ Html::script('plugins/greensock/TweenMax.min.js') }}
        {{ Html::script('plugins/greensock/TimelineMax.min.js') }}
        {{ Html::script('plugins/scrollmagic/ScrollMagic.min.js') }}
        {{ Html::script('plugins/greensock/animation.gsap.min.js') }}
        {{ Html::script('plugins/greensock/ScrollToPlugin.min.js') }}
        {{ Html::script('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}
        {{ Html::script('plugins/scrollTo/jquery.scrollTo.min.js') }}
        {{ Html::script('plugins/easing/easing.js') }}
        {{ Html::script('js/custom.js') }}
        @show
    </body>
</html>
