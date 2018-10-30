@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.management.lessons')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-capitalize">
                    <tr>
                        <th>@lang('message.table.lesson')</th>
                        <th>@lang('message.table.description')</th>
                        <th>@lang('message.table.course')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->lesson }}</td>
                            <td>{{ $lesson->description }}</td>
                            <td>{{ $lesson->course->course }}</td>
                            <td>
                                <a href="{{ route('lessons.edit', ['id' => $lesson->id]) }}" class="btn fa fa-eye"></a>
                                <a href="{{ route('lessons.destroy', ['id' => $lesson->id]) }}" class="btn fa fa-trash"></a>
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
                            {!! Form::open(['route' => 'lessons.store']) !!}
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
                                {!! Form::select('course_id', $courses, null, ['class' => 'form-control']) !!}

                                @if ($errors->has('course_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_id') }}</strong>
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
