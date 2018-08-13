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
                <div class="section_title text-left">
                    <h1 class="nav-link">
                        {{ trans('message.information') }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-4 course_box">
                    <div class="card">
                        {{ Html::image(asset('images/courses/course_1.jpg'), null, ['class' => 'card-img-top']) }}
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="text-left">
                        <div class="nav-link">
                            <h2>
                                <b>{{ $course->course }}</b>
                            </h2>
                        </div>
                        <div class="card-text">
                            {{ $course->description }}
                        </div>
                    </div>
                </div>
        </div>

        <div class="row">
                <div class="col">
                    <div class="text-left">
                        <h2 class="nav-link">{{ trans('message.list_of_lessons') }}: </h2>
                    </div>
                </div>
        </div>
        @if($lessons->count())
        <div class="row">
            <div class="col-lg-6">
                @foreach($lessons as $lesson)
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-link" href="#">
                            {{ $lesson->lesson }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-6 nav-link">
                {{ trans('message.courses_sorry') }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 nav-link">
                {{ trans('message.thanks') }}
            </div>
        </div>
        @endif
    </div>
@endsection
