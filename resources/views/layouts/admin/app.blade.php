<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    
    <title>@lang('text.ishopee')</title>
    
    {{ Html::style('admin/css/admin.css') }}
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}

    {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
</head>
<body>
    <div id="wrapper">
        @include('layouts.admin.header')
        @include('layouts.admin.menu')
        @yield('content')
    </div>
</body>
