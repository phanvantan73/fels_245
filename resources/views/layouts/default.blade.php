<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="jakelagger">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ trans('message.title') }}
    </title>
@section('css')
    {{ Html::style(asset('css/bootstrap.min.css')) }}
    {{ Html::style(asset('css/font-awesome.min.css')) }}
    {{ Html::style(asset('css/style.css')) }}
    @show
</head>
<body>
<div id="wrapper">
@include('layouts.nav_top')

@include('layouts.nav_menu')
    <div id="page-wrapper" class="page-wrapper-cls">
        <div id="page-inner">
            @yield('content-page')
        </div>
    </div>
</div>

<footer >
    <span>
        @lang('message.copy') &copy;
        @lang('message.all_rights_reserved')
    </span>
</footer>

@section('js')
    {{ Html::script(asset('js/jquery-3.2.1.min.js')) }}
    {{ Html::script(asset('js/bootstrap.min.js')) }}
    {{ Html::script(asset('js/jquery.metisMenu.js')) }}
    {{ Html::script(asset('js/custom.js')) }}
@show

</body>
</html>
