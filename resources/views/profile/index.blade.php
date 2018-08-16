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
                                {{ trans('message.profile') }}
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
                                {{ trans('message.profile') }}
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
                                {{ trans('message.profile') }}
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
                    <h1>{{ trans('message.your_information') }}</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            <div class="col-lg-4 course_box">
                <div class="card">
                    {{ Html::image(asset('images/courses/course_1.jpg'), null, ['class' => 'card-img-top']) }}
                </div>
            </div>
            <div class="col-lg-8">
                {!! Form::open(['route' => ['profile.update', $profile->id], 'method' => 'PATCH']) !!}
                <div class="form-group row">
                    {!! Form::label('first_name', trans('message.first_name'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('first_name', $profile->first_name, old('first_name'), ['class' => 'form-control', 'id' => 'first_name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('last_name', trans('message.last_name'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('last_name', $profile->last_name, old('last_name'), ['class' => 'form-control', 'id' => 'last_name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('birthday', trans('message.birthday'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::date('birthday', $profile->birthday, old('birthday'), ['class' => 'form-control', 'id' => 'birthday']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('address', trans('message.address'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::textarea('address', $profile->address, ['class' => 'form-control', 'rows' => 2, 'cols' => 15, 'id' => 'address']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phone_number', trans('message.phone_number'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('phone_number', $profile->phone_number, old('phone_number'), ['class' => 'form-control', 'id' => 'phone_number']) !!}
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-4">
                        {!! Form::submit(trans('message.edit_profile'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('events')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>{{ trans('message.your_follow') }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-bordered table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ trans('message.your_follower') }}</th>
                            <th>{{ trans('message.follow_time') }}</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped">
                    @foreach($followers as $follower)
                        <tr>
                            <td>
                                <a href="#" class="btn-link">
                                {{ $follower->getUserNameFromId($follower->follow_user_id) }}
                                </a>
                            </td>
                            <td>{{ $follower->follow_time }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
