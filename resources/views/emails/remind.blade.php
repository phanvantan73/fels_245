@extends('layouts.email')

@section('content')
    <h2>
        @lang('message.word_email', ['count' => $count])
    </h2>
@endsection
