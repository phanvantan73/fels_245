@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.detail')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default" id="edit-user">
                <div class="panel-heading text-uppercase">
                    @lang('message.edit')
                </div>
                <div class="panel-body">
                    {!! Form::model($word, ['method' => 'PATCH', 'route' => ['words.update', 'id' => $word->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('word', trans('message.table.word'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('word', old('word'), ['class' => 'form-control']) !!}

                        @if ($errors->has('word'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('word') }}</strong>
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
                        {!! Form::label('lesson_id', trans('message.table.lesson'), ['class' => 'text-capitalize']) !!}
                        {!! Form::select('lesson_id', $lessons, old('lesson_id'), ['class' => 'form-control']) !!}

                        @if ($errors->has('lesson_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lesson_id') }}</strong>
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
    </div>
@endsection
