@extends('layouts.default')

@section('content-page')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">@lang('message.dashboard')</h1>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-one">
                <a href="#">
                    <span class="glyphicon glyphicon-book"></span>
                    <h5>{{ $totalCourses }} @lang('message.management.courses')</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-two">
                <a href="#">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <h5>{{ $totalLessons }} @lang('message.management.lessons')</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-three">
                <a href="#">
                    <span class="glyphicon glyphicon-apple"></span>
                    <h5>{{ $totalWords }} @lang('message.management.words')</h5>
                </a>
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            <div class="style-box-one Style-one-clr-four">
                <a href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <h5>{{ $totalUsers }} @lang('message.management.users')</h5>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {{ Html::script(asset('js/adminjs.js')) }}
@endsection
