@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.management.courses')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-capitalize">
                    <tr>
                        <th>@lang('message.table.id')</th>
                        <th>@lang('message.table.course')</th>
                        <th>@lang('message.table.description')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <a href="{{ route('courses.edit', ['id' => $course->id]) }}" class="btn fa fa-eye"></a>
                                <a href="{{ route('courses.destroy', ['id' => $course->id]) }}" class="btn fa fa-trash"></a>
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
                            {!! Form::open(['route' => 'courses.store']) !!}
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
