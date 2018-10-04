@extends('layouts.master')

@section('css')
    @parent
    {!! Charts::styles() !!}
@endsection

@section('home')
    <div class="container">
        {{ Html::image(asset(config('setting.images.lesson_background'))) }}
    </div>
@endsection

@section('course_boxes')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.profiles.word_learned')</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            <div class="col-md-12">
                <div class="row text-capitalize quote">
                    @lang('message.profiles.chart')
                </div>
                <div class="row course_boxes">
                    <div class="col-lg-4">
                        {!! Form::open(['route' => 'chart.by.date']) !!}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::date('get_date', config('setting.default.today'), ['class' => 'form-control', 'id' => 'get_date']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Form::submit(trans('message.profiles.see'), ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <a href="{{ route('chart.by.month') }}" class="text-capitalize btn btn-link">
                            @lang('message.profiles.by_month')
                        </a>
                    </div>
                </div>

                {!! $chart->html() !!}

            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection
