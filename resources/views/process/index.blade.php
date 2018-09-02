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
                                <a class="nav-link text-uppercase" href="{{ route('courses.show', ['course' => $course->id]) }}">
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
            <div class="col-lg-6">
                <div class="section_title text-center">
                    <h1>
                        @lang('message.processes.word.your')
                    </h1>
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
                                {{ $word->pivot->status }}
                            </td>
                            <td>
                                <a href="{{ route('courses.show', ['course' => $word->lesson->course->id]) }}">
                                    {{ $word->lesson->course->course }}
                                </a>
                            </td>
                            <td>{{ $word->pivot->add_to_list_time }}</td>
                            <td>{{ $word->pivot->learn_time }}</td>
                            <td>
                                <a id="learn-word" class="{{ $word->pivot->status == trans('message.processes.word.learned') ? 'btn btn-primary disabled' : 'btn btn-primary' }}" href="{{ route('process.learn.word', ['id' => $word->pivot->id]) }}">
                                    @lang('message.processes.word.learn')
                                </a>
                                <a id="delete-word" class="btn btn-danger" href="{{ route('process.delete.word', ['id' => $word->pivot->id]) }}">
                                    @lang('message.processes.word.delete')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
