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
        {{ Html::style(asset('css/all.css')) }}
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
    {{ Html::script(asset('js/all.js')) }}
@show
</body>
</html>
