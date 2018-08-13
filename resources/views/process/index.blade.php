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
                    <h1>@lang('message.your_courses')</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            @forelse ($courses as $course)
                <!-- Popular Course Item -->
                <div class="col-lg-4 course_boxes">
                    <div class="card">
                        {{ Html::image(asset($course->image), null, ['class' => 'card-img-top']) }}
                        <div class="price_box d-flex flex-row align-items-center">
                            <b>
                                <a class="nav-link text-uppercase" href="{{ route('courses.show', ['course' => $course->course_id]) }}">
                                    @lang('message.lesson.now')
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
    </div>
@endsection

@section('events')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.processes.word.your')</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>@lang('message.processes.word.plural')</th>
                            <th>@lang('message.processes.word.status')</th>
                            <th>@lang('message.processes.word.course')</th>
                            <th>@lang('message.processes.word.add_time')</th>
                            <th>@lang('message.processes.word.learn_time')</th>
                            <th>@lang('message.processes.word.option')</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped quote">
                    @foreach ($words as $word)
                        <tr>
                            <td>{{ $word->word }}</td>
                            <td>
                                {{ $word->status == config('setting.default.learned') ? trans('message.processes.word.learned') : trans('message.processes.word.unlearned') }}
                            </td>
                            <td>
                                <a href="{{ route('courses.show', ['course' => $word->course_id]) }}">
                                    {{ $word->course->course }}
                                </a>
                            </td>
                            <td>{{ $word->add_to_list_time }}</td>
                            <td>{{ $word->learn_time }}</td>
                            <td>
                                <a class="{{ $word->status == config('setting.default.learned') ? 'btn btn-primary disabled' : 'btn btn-primary' }}" href="#">
                                    @lang('message.processes.word.learn')
                                </a>
                                <a class="btn btn-danger" href="#">@lang('message.processes.word.delete')</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
