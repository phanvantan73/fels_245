@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.edit')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="panel panel-default" id="edit-user">
                <div class="panel-heading text-uppercase">
                    @lang('message.edit')
                </div>
                <div class="panel-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user-management.update', 'id' => $user->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('username', trans('message.username')) !!}
                        {!! Form::text('username', old('username'), ['class' => ['form-control', $errors->has('username') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'username']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', trans('message.email')) !!}
                        {!! Form::email('email', old('email'), ['class' => ['form-control', $errors->has('email') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'email']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role_id', trans('message.permission'), ['class' => 'text-capitalize']) !!}
                        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
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
