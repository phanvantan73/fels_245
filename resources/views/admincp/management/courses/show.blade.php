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
                    {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', 'id' => $course->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('course', trans('message.table.course'), ['class' => 'text-capitalize']) !!}
                        {!! Form::text('course', $course->course, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('message.table.description'), ['class' => 'text-capitalize']) !!}
                        {!! Form::textarea('description', $course->description, ['class' => 'form-control', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit(trans('message.delete'), ['class' => 'form-control btn btn-warning text-capitalize']) !!}
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
@endsection
