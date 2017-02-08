<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>@lang('frontend.ishopee')</title>

    {{ Html::style('css/app.css') }}
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('user/css/user.css') }}

    {{ Html::script('js/app.js') }}
    {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
</head>
<body>
    <div id="wrapper">
        @include('layouts.user.header')
        @include('layouts.user.slide')
        @yield('content')
        @include('layouts.user.footer')
    </div>
</body>
</html>
