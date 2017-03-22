@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 profile">
            <h2 class="title" align="center">@lang('user.info_user')</h2>
                
            <table width="90%" align="right">
                <tr>
                    <th width="50%" height="50">
                        @lang('user.fullname')
                    </th>
                    <td>{!! $user->name !!}</td>
                </tr>
                <tr>
                    <th height="50">
                        @lang('admin.email')
                    </th>
                    <td>{!! $user->email !!}</td>
                </tr>
                <tr>
                    <th height="50">
                        @lang('admin.phone')
                    </th>
                    <td>{!! $user->phone !!}</td>    
                </tr>
                <tr>
                    <th height="50">
                        @lang('admin.avatar')
                    </th>
                    <td><img src="{!! $user->avatar !!}" 
                        alt="" width="150" height="150"></td>
                </tr>
                <tr>
                    <th height="50">
                        @lang('user.auth')
                    </th>
                    <td>{!! config('myconfig.auth')[$user->is_admin] !!}</td>
                </tr>
            </table>
            <div class="col-lg-6 profile-edit" align="right">
                <a href="{!! route('user.user.edit', $user->id) !!}">
                    @lang('admin.edit')</a></div>
        </div>
    </div>
</div>
@stop
