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
                    <h1>@lang('message.your_information')</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            <div class="col-lg-4 course_box">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            {{ Html::image(asset($profile->avatar), null, ['class' => 'card-img-top']) }}
                        </div>
                    </div>
                </div>
                <div class="row course_boxes">
                    <div class="col">
                        {!! Form::open(['route' => 'profile.change.avatar', 'files' => true]) !!}
                        <div class="form-group row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        {!! Form::file('avatar', null) !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        @if ($errors->has('avatar'))
                                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        {!! Form::submit(trans('message.profiles.change_avatar'), ['class' => 'btn btn-primary btn-block']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 quote">
                {!! Form::open(['route' => 'profile.update']) !!}
                <div class="form-group row">
                    {!! Form::label('first_name', trans('message.profiles.first_name'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('first_name', $profile->first_name, old('first_name'), ['class' => 'form-control', 'id' => 'first_name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('last_name', trans('message.profiles.last_name'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('last_name', $profile->last_name, old('last_name'), ['class' => 'form-control', 'id' => 'last_name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('birthday', trans('message.profiles.birthday'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::date('birthday', $profile->birthday, old('birthday'), ['class' => 'form-control', 'id' => 'birthday']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('address', trans('message.profiles.address'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::textarea('address', $profile->address, ['class' => 'form-control', 'rows' => 2, 'cols' => 15, 'id' => 'address']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('phone_number', trans('message.profiles.phone_number'), ['class' => 'col-lg-4 col-form-label text-lg-right']) !!}

                    <div class="col-lg-6">
                        {!! Form::text('phone_number', $profile->phone_number, old('phone_number'), ['class' => 'form-control', 'id' => 'phone_number']) !!}
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-lg-8 offset-lg-4">
                        {!! Form::submit(trans('message.profiles.save'), ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>@lang('message.profiles.your_activities')</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="tab-content">
                    <div role="tabpanel">
                        <ul class="list-group">

                            @foreach ($activities as $activity)
                                <li class="quote list-group-item list-group-item-info list-group-item-action course_boxes">
                                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>
                                        <a href="{{ route('profile') }}" class="text-dark">
                                            {{ Auth::user()->username }}
                                        </a>
                                    </strong>
                                    <span>
                                        {!! $activity->content !!}
                                    </span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('events')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>
                        @lang('message.profiles.your_follow')
                    </h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">
            <div class="col-lg-6">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>
                            @lang('message.profiles.your_follower')
                        </th>
                        <th>
                            @lang('message.profiles.follow_time')
                        </th>
                    </tr>
                    </thead>

                    <tbody class="table-striped quote">

                    @foreach ($followers as $follower)
                        <tr>
                            <td>
                                <a href="#" class="btn-link">
                                    {{ $follower->userFollow->username }}
                                </a>
                            </td>
                            <td>
                                {{ $follower->follow_time }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>
                            @lang('message.profiles.your_following')
                        </th>
                        <th>
                            @lang('message.profiles.follow_time')
                        </th>
                        <th>
                            @lang('message.profiles.option')
                        </th>
                    </tr>
                    </thead>

                    <tbody class="table-striped quote">

                    @foreach ($followings as $following)
                        <tr>
                            <td>
                                <a href="#" class="btn-link">
                                    {{ $following->userFollow->username }}
                                </a>
                            </td>
                            <td>
                                {{ $following->follow_time }}
                            </td>
                            <td>
                                <a href="{{ route('profile.unfollow', ['id' => $following->id]) }}" class="btn-xs btn-outline-danger">
                                    @lang('message.action.unfollow')
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>
                        @lang('message.lesson.test')
                    </h1>
                </div>
            </div>
        </div>

        <div class="row quote">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div id="tests-data">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-capitalize">
                                        @lang('message.profiles.tests')
                                    </th>
                                    <th class="text-capitalize">
                                        @lang('message.profiles.created_at')
                                    </th>
                                    <th class="text-capitalize">
                                        @lang('message.profiles.score')
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($tests as $test)
                                    <tr>
                                        <td class="text-capitalize">
                                            @lang('message.profiles.your_test', ['num' => $test->id])
                                        </td>
                                        <td>
                                            {{ $test->created_at }}
                                        </td>
                                        <td>
                                            {{ $test->result->score }}
                                        </td>
                                        <td class="text-center text-capitalize">
                                            <a href="{{ route('profile.show.test', ['id' => $test->id]) }}" class="btn btn-outline-info btn-block">
                                                @lang('message.profiles.detail')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <h1>
                                        @lang('message.notFoundError')
                                    </h1>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row course_boxes">
                    {{ $tests->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {{ Html::script('js/paginate.js') }}
@endsection
