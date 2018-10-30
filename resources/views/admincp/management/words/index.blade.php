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
                        <th>@lang('message.table.word')</th>
                        <th>@lang('message.table.description')</th>
                        <th>@lang('message.table.lesson')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($words as $word)
                        <tr>
                            <td>{{ $word->word }}</td>
                            <td>{{ $word->description }}</td>
                            <td>{{ $word->lesson->lesson }}</td>
                            <td>
                                <a href="{{ route('words.edit', ['id' => $word->id]) }}" class="btn fa fa-eye"></a>
                                <a href="{{ route('words.destroy', ['id' => $word->id]) }}" class="btn fa fa-trash"></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $words->links() }}
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-heading text-uppercase">
                            @lang('message.add')
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'words.store']) !!}
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
                                {!! Form::select('lesson_id', $lessons, null, ['class' => 'form-control']) !!}

                                @if ($errors->has('lesson_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lesson_id') }}</strong>
                                    </span>
                                @endif
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
