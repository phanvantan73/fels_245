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
                <div class="section_title text-left">
                    <h1>@lang('message.information')</h1>
                </div>
            </div>
        </div>

        <div class="row quote">
            <div class="col col-lg-6">
                <div class="row">
                    <div class="col">
                        <span class="nav-link">
                            <strong>
                                @lang('message.lesson.lesson', ['lesson' => $lesson->id])
                            </strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="nav-link">
                            <strong>
                                @lang('message.lesson.course'):
                                <a class="btn btn-outline-info" href="{{ route('courses.show', ['course' => $lesson->course->id]) }}">
                                    {{ $lesson->course->course }}
                                </a>
                            </strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="nav-link">
                            <strong>
                                @lang('message.lesson.num_of_questions'):
                                {{ $lesson->questions()->count() }}
                            </strong>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="nav-link">
                            <strong>
                                @lang('message.lesson.name'):
                            </strong>
                            {{ $lesson->lesson }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="nav-link">
                            <strong>
                                @lang('message.lesson.description'):
                            </strong>
                            {!! $lesson->description !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row course_boxes">
            <div class="col">
                {!! Form::button(trans('message.lesson.now'), ['class' => 'btn btn-success btn-lg btn-block', 'id' => 'lessons-now']) !!}
            </div>
            <div class="col">
                {!! Form::button(trans('message.lesson.back'), ['class' => 'btn btn-primary btn-lg btn-block', 'id' => 'back']) !!}
            </div>
        </div>
        <div class="row course_boxes quote" id="your-test">
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
                    {!! Form::open(['route' => 'tests.store', 'id' => 'done-test']) !!}
                    @forelse ($questions as $question)
                        <div class="form-row course_boxes" id="toc_container_mini">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        {!! $question->content !!}
                                    </div>
                                </div>
                                <div class="row course_boxes">
                                    <div class="col">
                                        {!! Form::hidden("questions[$question->id]", $question->id) !!}
                                        @foreach ($question->options as $option)
                                            <div class="radio">
                                                {!! Form::radio("answers[$question->id]", $option->id, null, ['id' => $option->id]) !!}
                                                {!! Form::label($option->id, $option->option) !!}
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
                    <div class="form-row">
                        <div class="col-lg-4">
                            {!! Form::submit(trans('message.lesson.finish_test'), ['class' => 'btn btn-lg btn-block btn-success']) !!}
                        </div>
                        <div class="col-lg-5 text-right">
                            @lang('message.test_timer')
                        </div>
                        <div class="col-lg-3">
                            <div id="startValuesAndTargetExample">
                                <div class="values timer_test"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {{ Html::script(asset('js/jquery-3.2.1.min.js')) }}
    {{ Html::script(asset('js/ajax.js')) }}
    {{ Html::script(asset('js/easytimer.min.js')) }}
@endsection
