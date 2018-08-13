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
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Get your <span>Education</span>
                            today!
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
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Get your <span>Education</span>
                            today!
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
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
                            Get your <span>Education</span>
                            today!
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

@section('hero_boxes')
    <div class="row">

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset('images/earth-globe.svg'), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        {{ trans('message.online_courses') }}
                    </h2>
                    <a href="{{ route('courses.index') }}" class="hero_box_link">
                        {{ trans('message.view_more') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset('images/books.svg'), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        {{ trans('message.our_library') }}
                    </h2>
                    <a href="courses.html" class="hero_box_link">
                        {{ trans('message.view_more') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                {{ Html::image(asset('images/envelope.svg'), null, ['class' => 'svg']) }}
                <div class="hero_box_content">
                    <h2 class="hero_box_title">
                        {{ trans('message.our_event') }}
                    </h2>
                    <a href="teachers.html" class="hero_box_link">
                        {{ trans('message.view_more') }}
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
                        <h1>{{ trans('message.up_event') }}</h1>
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
                                    <div class="event_day">07</div>
                                    <div class="event_month">January</div>
                                </div>
                            </div>

                            <div class="col-lg-6 order-lg-2 order-3">
                                <div class="event_content">
                                    <div class="event_name"><a class="trans_200" href="#">Student Festival</a></div>
                                    <div class="event_location">Grand Central Park</div>
                                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor
                                        nisl
                                        ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 order-lg-3 order-1">
                                <div class="event_image">
                                    <img src="images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Event Item -->
                <div class="row event_item">
                    <div class="col">
                        <div class="row d-flex flex-row align-items-end">

                            <div class="col-lg-2 order-lg-1 order-2">
                                <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                    <div class="event_day">07</div>
                                    <div class="event_month">January</div>
                                </div>
                            </div>

                            <div class="col-lg-6 order-lg-2 order-3">
                                <div class="event_content">
                                    <div class="event_name"><a class="trans_200" href="#">Open day in the
                                            Univesrsity
                                            campus</a></div>
                                    <div class="event_location">Grand Central Park</div>
                                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor
                                        nisl
                                        ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 order-lg-3 order-1">
                                <div class="event_image">
                                    <img src="images/event_2.jpg" alt="https://unsplash.com/@claybanks1989">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Event Item -->
                <div class="row event_item">
                    <div class="col">
                        <div class="row d-flex flex-row align-items-end">

                            <div class="col-lg-2 order-lg-1 order-2">
                                <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                    <div class="event_day">07</div>
                                    <div class="event_month">January</div>
                                </div>
                            </div>

                            <div class="col-lg-6 order-lg-2 order-3">
                                <div class="event_content">
                                    <div class="event_name"><a class="trans_200" href="#">Student Graduation
                                            Ceremony</a>
                                    </div>
                                    <div class="event_location">Grand Central Park</div>
                                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor
                                        nisl
                                        ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 order-lg-3 order-1">
                                <div class="event_image">
                                    <img src="images/event_3.jpg" alt="https://unsplash.com/@juanmramosjr">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
@endsection
