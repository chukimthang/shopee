@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3 class="title" align="center">@lang('user.update_profile')</h3>
            
            <div class="form-error"></div>
            
            <div class="form-group">
                {!! Form::label('name', Lang::get('user.fullname')) !!}
                {!! Form::text('name', $user->name, [
                    'class' => 'form-control'
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', Lang::get('admin.email')) !!}
                {!! Form::text('email', $user->email, [
                    'class' => 'form-control',
                    'disabled' => 'true',
                    'user-id' => $user->id
                ]) !!}
            </div>

             <div class="form-group">
                {!! Form::label('phone', Lang::get('admin.phone')) !!}
                {!! Form::text('phone', $user->phone, [
                    'class' => 'form-control'
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('avatar', Lang::get('admin.avatar')) !!}
                {!! Form::file('avatar', [
                    'id' => 'avatar', 
                    'accept' => 'image/*'
                ]) !!}
                <a href="javascript:void(0)" id="upload-avatar"
                    class="btn btn-default">Upload</a> 
                <div id="process-avatar" style="display: none">
                    Process...</div>

                <p id="display-avatar">
                    <img src="{!! $user->avatar !!}" alt=""
                        width="100" height="100">
                </p>
                <p id="link-avatar"></p>
            </div>

            <div class="form-group update-profile">
                {!! Form::submit(Lang::get('admin.update'),
                    ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{!! asset('user/js/user.js') !!}"></script>
<script type="text/javascript">
    var user = new user;
    user.init();
</script>
@stop
