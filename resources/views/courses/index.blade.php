@extends('layouts.master')

@section('home')
    <div class="hero_slider_container">
        <div class="hero_slider owl-carousel">
            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset('images/slider_background.jpg')) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center text-uppercase">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            <span>
                                {{ trans('message.courses') }}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset('images/slider_background.jpg')) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center text-uppercase">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            <span>
                                {{ trans('message.courses') }}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset('images/slider_background.jpg')) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center text-uppercase">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            <span>
                                {{ trans('message.courses') }}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>

        </div>

        <div class="hero_slider_left hero_slider_nav trans_200">
            <span class="trans_200">
                {{ trans('message.pre') }}
            </span>
        </div>
        <div class="hero_slider_right hero_slider_nav trans_200">
            <span class="trans_200">
                {{ trans('message.next') }}
            </span>
        </div>
    </div>
@endsection

@section('course_boxes')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>{{ trans('message.popular_courses') }}</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
        @if($courses->count())
            @foreach($courses as $course)
                <!-- Popular Course Item -->
                <div class="col-lg-4 course_box">
                    <div class="card">
                        {{ Html::image(asset('images/courses/course_1.jpg'), null, ['class' => 'card-img-top']) }}
                        <div class="card-body text-center">
                            <div class="card-title">
                                <a href="{{ route('courses.show', ['course' => $course->id]) }}">
                                    {{ $course->course }}
                                </a>
                            </div>
                            <div class="card-text">
                                {{ $course->description }}
                            </div>
                        </div>
                        <div class="price_box d-flex flex-row align-items-center">
                            <b>
                                <a class="nav-link text-uppercase" href="{{ route('courses.show', ['course' => $course->id]) }}">
                                    {{ trans('message.view_more') }}
                                </a>
                            </b>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
        <div class="row">
            <div class="col">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
@endsection

@section('events')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>{{ trans('message.your_courses') }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
