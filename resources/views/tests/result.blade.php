@extends('layouts.master')

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
                    <h1>@lang('message.test.done')</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes quote">
            <div class="col-lg-4" id="toc_container">
                <div class="row">
                    <div class="col">
                        <div class="text-lg text-center text-uppercase">
                            <h1>
                                @lang('message.test.score')
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row course_boxes">
                    <div class="col">
                        <div class="row d-flex flex-row align-items-end">
                            <div class="col-lg order-lg-1 order-2">
                                <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                    <div class="event_day">
                                        {{ $test->result->score }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-1 order-2">
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label(trans('message.test.correct'), trans('message.test.correct'), ['class' => 'text-success']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {!! Form::label(trans('message.test.incorrect'), trans('message.test.incorrect'), ['class' => 'text-danger']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col">
                    <div id="toc_container">
                        <div class="row">
                            <div class="col">
                                <div class="text-lg text-center text-uppercase">
                                    <h1>
                                        @lang('message.lesson.test')
                                    </h1>
                                </div>
                            </div>
                        </div>
                        @forelse ($test->testAnswers as $testAnswer)
                            <div class="form-row course_boxes" id="toc_container_mini">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            {!! $testAnswer->question->content !!}
                                        </div>
                                    </div>
                                    <div class="row course_boxes">
                                        <div class="col">
                                            @foreach ($testAnswer->question->options as $option)
                                                <div class="radio disabled">
                                                    @if ($option->id == $testAnswer->option->id)
                                                        {!! Form::radio($testAnswer->id, $option->id, true, ['id' => $option->id]) !!}
                                                        {!! Form::label($option->id, $option->option, ['class' => $testAnswer->option->is_true ? 'text-success' : 'text-danger']) !!}
                                                    @else
                                                        {!! Form::radio($testAnswer->id, $option->id, null, ['id' => $option->id]) !!}
                                                        {!! Form::label($option->id, $option->option) !!}
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col">
                                    @lang('message.notFoundError')
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
