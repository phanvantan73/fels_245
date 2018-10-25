@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.detail')</h1>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-4 col-sm-4">
            <div class="style-box-one Style-one-clr-one">
                <a href="#show-lesson">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <h5>{{ $course->lessons()->count() }} @lang('message.management.lessons')</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-4 col-sm-4">
            <div class="style-box-one Style-one-clr-two">
                <a href="#show-word-user">
                    <span class="glyphicon glyphicon-apple"></span>
                    <h5>{{ $course->words()->count() }} @lang('message.management.words')</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-4 col-sm-4">
            <div class="style-box-one Style-one-clr-four">
                <a href="#show-word-user">
                    <span class="glyphicon glyphicon-user"></span>
                    <h5>{{ $course->users()->count() }} @lang('message.user_learning')</h5>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" id="edit-user">
                <div class="panel-heading text-uppercase">
                    @lang('message.edit')
                </div>
                <div class="panel-body">
                    {!! Form::model($course, ['method' => 'PATCH', 'route' => ['courses.update', 'id' => $course->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('course', trans('message.table.course'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('course', old('course'), ['class' => 'form-control', 'id' => 'course']) !!}

                        @if ($errors->has('course'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('message.table.description'), ['class' => 'text-capitalize']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'description']) !!}

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('message.edit'), ['class' => 'form-control btn btn-success text-capitalize']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" id="show-lesson">
            <div class="panel panel-default" id="edit-user">
                <div class="panel-heading text-uppercase">
                    @lang('message.table.lessons')
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <td>@lang('message.table.lesson')</td>
                                <td>@lang('message.table.description')</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($course->lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->lesson }}</td>
                                    <td>{{ $lesson->description }}</td>
                                    <td>
                                        <a href="#" class="btn fa fa-edit"></a>
                                        <a href="#" class="btn fa fa-trash"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="show-word-user">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading text-capitalize">
                    @lang('message.table.words')
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="text-capitalize">
                            <tr>
                                <th>@lang('message.table.word')</th>
                                <th>@lang('message.table.description')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($course->words as $word)
                                <tr>
                                    <td>{{ $word->word }}</td>
                                    <td>{{ $word->description }}</td>
                                    <td>
                                        <a href="#" class="btn fa fa-edit"></a>
                                        <a href="#" class="btn fa fa-trash"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-capitalize">
                    @lang('message.table.users')
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="text-capitalize">
                            <tr>
                                <th>@lang('message.table.username')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($course->users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('users.edit', ['id' => $user->id]) }}">
                                            {{ $user->username }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
