@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.detail')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default" id="edit-user">
                <div class="panel-heading text-uppercase">
                    @lang('message.edit')
                </div>
                <div class="panel-body">
                    {!! Form::model($lesson, ['method' => 'PATCH', 'route' => ['lessons.update', 'id' => $lesson->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('lesson', trans('message.table.lesson'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('lesson', old('lesson'), ['class' => 'form-control']) !!}

                        @if ($errors->has('lesson'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lesson') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('message.table.description'), ['class' => 'text-capitalize']) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('course_id', trans('message.table.course'), ['class' => 'text-capitalize']) !!}
                        {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control']) !!}

                        @if ($errors->has('course_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_id') }}</strong>
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
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-capitalize">
                    @lang('message.table.questions')
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr class="text-capitalize">
                                <th>@lang('message.table.content')</th>
                                <th>@lang('message.table.description')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lesson->questions as $question)
                                <tr>
                                    <td>{{ $question->content }}</td>
                                    <td>{{ $question->description }}</td>
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
