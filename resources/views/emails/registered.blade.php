@extends('layouts.email')

@section('content')
    <h1>
        @lang('message.total_user', ['count' => $count])
    </h1>
@endsection
