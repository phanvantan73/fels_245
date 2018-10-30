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
                    @lang('message.detail')
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', 'id' => $question->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('content', trans('message.table.content'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('content', $question->content, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('message.table.description'), ['class' => 'text-capitalize']) !!}
                        {!! Form::textarea('description', $question->description, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lesson_id', trans('message.table.lesson'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('lesson_id', $question->lesson->lesson, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('message.delete'), ['class' => 'form-control btn btn-danger text-capitalize']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading text-capitalize">
                    @lang('message.table.options')
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr class="text-capitalize">
                                <th>@lang('message.table.option')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($question->options as $option)
                                <tr>
                                    <td>{{ $option->option }}</td>
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
