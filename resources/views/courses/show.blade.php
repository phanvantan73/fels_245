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
                <div class="section_title text-left">
                    <h1 class="nav-link">
                        @lang('message.information')
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 course_box">
                <div class="card">
                    {{ Html::image(asset($course->image), null, ['class' => 'card-img-top']) }}
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
                        {!! $course->description !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="text-left">
                    <h2 class="nav-link">@lang('message.list_of_lessons'): </h2>
                </div>
            </div>
        </div>
        @forelse ($course->lessons as $lesson)
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-link" href="{{ route('lessons.show', ['lesson' => $lesson->id]) }}">
                                {{ $lesson->lesson }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-lg-6 nav-link">
                    @lang('message.courses_sorry')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 nav-link">
                    @lang('message.thanks')
                </div>
            </div>
        @endforelse
    </div>
@endsection

@section('events')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="nav-link">
                    @lang('message.comments')
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="comment_field">
                    <div class="cm-base">
                        <p class="">
                            @lang('message.comments')
                        </p>
                        {!! Form::open(['route' => 'courses.index', 'name' => 'frmComment', 'id' => 'frmComment']) !!}
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                {!! Form::textarea('cmText', null, ['class' => 'form-control', 'name' => 'txtCmt', 'id' => 'txtCmt', 'cols' => 50, 'rows' => 3]) !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::submit(trans('message.send'), ['class' => 'btn btn-lg btn-success', 'name' => 'btnCmt', 'id' => 'btnCmt']) !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {!! Form::close() !!}
                        <div class="blog-comment" id="comment-done">
                            <ul class="comments">
                                <li id="comment_id" class="clearfix">
                                    <div class="avatar-comment"></div>
                                    <div class="post-comments">
                                        <p>1</p>
                                        <p class="meta-2">
                                            <a href="#">
                                                @lang('message.username')
                                            </a>
                                            <small class="pull-right">
                                                <a href="#">
                                                    @lang('message.minutes')
                                                </a>
                                                <a href="#">
                                                    @lang('message.answer')
                                                </a>
                                            </small>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
