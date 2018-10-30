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
                    @lang('message.detail')
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['words.destroy', 'id' => $word->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('word', trans('message.table.word'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('word', $word->word, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('message.table.description'), ['class' => 'text-capitalize']) !!}
                        {!! Form::textarea('description', $word->description, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lesson_id', trans('message.table.lesson'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('lesson_id', $word->lesson->lesson, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('message.delete'), ['class' => 'form-control btn btn-danger text-capitalize']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
