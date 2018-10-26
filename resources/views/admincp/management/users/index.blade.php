@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line text-uppercase">@lang('message.users')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>@lang('message.username')</th>
                        <th>@lang('message.email')</th>
                        <th>@lang('message.permission')</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="label label-info">{{ $role->role }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn fa fa-edit"></a>
                                <a href="{{ route('users.destroy', ['id' => $user->id]) }}" class="btn fa fa-trash"></a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', 'id' => $user->id]]) !!}
                                {!! Form::close() !!}
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
                            {!! Form::open(['route' => 'users.store']) !!}
                            <div class="form-group">
                                {!! Form::label('username', trans('message.username')) !!}
                                {!! Form::text('username', old('username'), ['class' => 'form-control']) !!}

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('message.email')) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', trans('message.password')) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
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
