@extends('layouts.master')

@section('home')
    <div class="container">
        {{ Html::image(asset(config('setting.images.lesson_background'))) }}
    </div>
@endsection

@section('course_boxes')
    <div class="container">
        <div class="row quote">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.want_to_learn')</h1>
                </div>
            </div>
        </div>
        <div class="row course_boxes quote">
            <div class="col text-center text-danger">
                <h1>{{ $word->word }}</h1>
            </div>
        </div>
        <div class="row course_boxes">
            <div class="col-md-8">
                {!! Html::image(asset($word->image)) !!}
            </div>
            <div class="col-md-4">
                <div class="row quote">
                    <div class="col">
                        <div class="section_title text-left">
                            <h1>@lang('message.information')</h1>
                        </div>
                    </div>
                </div>
                <div class="row course_boxes">
                    <div class="col">
                        <audio controls="controls">
                            <source src="{{ asset($word->audio) }}" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
                <div class="row quote course_boxes">
                    <div class="col">
                        @lang('message.lesson.description') :
                    </div>
                </div>
                <div class="row quote course_boxes">
                    <div class="col">
                        {!! $word->description !!}
                    </div>
                </div>
                <div class="row quote course_boxes">
                    <div class="col">
                        <a href="{{ route('process.learn.word', ['id' => $word->id]) }}" class="btn btn-block btn-success btn-lg">
                            @lang('message.action.learn')
                        </a>
                    </div>
                </div>
                <div class="row course_boxes">
                    <div class="col">
                        <a href="{{ route('process') }}" class="btn btn-block btn-danger btn-lg">
                            @lang('message.lesson.back')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
