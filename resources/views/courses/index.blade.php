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
                    <div class="hero_slide_content text-center text-uppercase">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            <span>
                                @lang('message.courses')
                            </span>
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

@section('course_boxes')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.popular_courses')</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            @forelse ($courses as $course)
                <!-- Popular Course Item -->
                <div class="col-lg-4 course_boxes">
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
                        <div class="price_box d-flex flex-row align-items-center">
                            <b>
                                <a class="nav-link text-uppercase"
                                   href="{{ route('courses.show', ['course' => $course->id]) }}">
                                    @lang('message.view_more')
                                </a>
                            </b>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    @lang('message.notFoundError')
                </div>
            @endforelse
        </div>
        <div class="row course_boxes">
            <div class="col">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
@endsection
