@extends('layouts.master')

@section('home')
    <div class="hero_slider_container">
        <div class="hero_slider owl-carousel">
            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset(config('setting.images.slider_background'))) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            @lang('message.get_your_edu')
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset(config('setting.images.slider_background'))) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            @lang('message.get_your_edu')
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background">
                    {{ Html::image(asset(config('setting.images.slider_background'))) }}
                </div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            @lang('message.get_your_edu')
                        </h1>
                    </div>
                </div>
            </div>

        </div>

        <div class="hero_slider_left hero_slider_nav trans_200">
            <span class="trans_200">
                @lang('message.pre')
            </span>
        </div>
        <div class="hero_slider_right hero_slider_nav trans_200">
            <span class="trans_200">
                @lang('message.next')
            </span>
        </div>
    </div>
@endsection

@section('hero_boxes')
    <div class="row">

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset(config('setting.images.online_courses')), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        @lang('message.online_courses')
                    </h2>
                    <a href="{{ route('courses.index') }}" class="hero_box_link">
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset(config('setting.images.our_library')), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        @lang('message.our_library')
                    </h2>
                    <a href="#" class="hero_box_link">
                        @lang('message.view_more')
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset(config('setting.images.our_event')), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        @lang('message.our_event')
                    </h2>
                    <a href="#" class="hero_box_link">
                        @lang('message.view_more')
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('course_boxes')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.popular_courses') </h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
        @if ($courses->count())
            @foreach ($courses as $course)
                <!-- Popular Course Item -->
                <div class="col-lg-4 course_box">
                    <div class="card">
                        {{ Html::image(asset($course->image), null, ['class' => 'card-img-top']) }}
                        <div class="card-body text-center">
                            <div class="card-title">
                                <a href="{{ route('courses.show', ['course' => $course->id]) }}">
                                    {{ $course->course }}
                                </a>
                            </div>
                            <div class="card-text">
                                {!! $course->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
@endsection

@section('events')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.up_event') </h1>
                </div>
            </div>
        </div>

        <div class="event_items">

            <!-- Event Item -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">

                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day"></div>
                                <div class="event_month"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#"></a></div>
                                <div class="event_location"></div>
                                <p></p>
                            </div>
                        </div>

                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                {{ Html::image(asset(config('setting.images.event_img'))) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
