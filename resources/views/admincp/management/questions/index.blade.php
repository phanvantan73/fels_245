@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.management.questions')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-capitalize">
                    <tr>
                        <th>@lang('message.table.content')</th>
                        <th>@lang('message.table.description')</th>
                        <th>@lang('message.table.lesson')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->content }}</td>
                            <td>{{ $question->description }}</td>
                            <td>{{ $question->lesson->lesson }}</td>
                            <td>
                                <a href="{{ route('questions.edit', ['id' => $question->id]) }}" class="btn fa fa-eye"></a>
                                <a href="{{ route('questions.destroy', ['id' => $question->id]) }}" class="btn fa fa-trash"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-heading text-uppercase">
                            @lang('message.add')
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'questions.store']) !!}
                            <div class="form-group">
                                {!! Form::label('content', trans('message.table.content'), ['class' => 'text-capitalize']) !!}
                                {!! Form::text('content', old('content'), ['class' => 'form-control']) !!}

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
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
                                {!! Form::select('lesson_id', $lessons, null, ['class' => 'form-control']) !!}

                                @if ($errors->has('lesson_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lesson_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('options', trans('message.table.options'), ['class' => 'text-capitalize']) !!}
                                {!! Form::textarea('options', old('options'), ['class' => 'form-control', 'id' => 'options', 'placeholder' => trans('message.table.option_rule')]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('true_option', trans('message.table.true_option'), ['class' => 'text-capitalize']) !!}
                                {!! Form::text('true_option', old('true_option'), ['class' => ['form-control', $errors->has('true_option') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'true_option']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit(trans('message.add'), ['class' => 'form-control btn btn-success text-capitalize']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {{ Html::script(asset('js/adminjs.js')) }}
@endsection
