@extends('layouts.user.app')

@section('content')
<div class="content-create-shop">
    <h2 align="center">@lang('user.create_shop')</h2>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-error"></div>

            <div class="form-group">
                {!! Form::label('name', Lang::get('user.name')) !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control', 
                    'placeholder' => Lang::get('user.message.holder', 
                        ['name' => 'tên shop'])
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address', Lang::get('user.address')) !!}
                {!! Form::text('address', null, [
                    'class' => 'form-control',
                    'placeholder' => Lang::get('user.message.holder', 
                        ['name' => 'Địa chỉ'])
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', Lang::get('user.category')) !!}
                {!! Form::select('category_id', $categories, null, [
                    'class' => 'form-control',
                    'placeholder' => Lang::get('user.message.select',
                        ['name' => 'chuyên mục'])
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', Lang::get('user.description')) !!}
                {!! Form::textarea('description', null, [
                    'class' => 'form-control',
                    'placeholder' => Lang::get('user.message.holder', 
                        ['name' => 'mô tả'])
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', [
                    'id' => 'photo-shop', 
                    'accept' => 'image/*'
                ]) !!}
                {!! Form::submit('Upload', [
                    'id' => 'upload-shop',
                    'class' => 'btn btn-default'
                ]) !!}
                <div id="process-shop" style="display: none">Process...</div>
                <p id="display-shop"></p>
            </div>

            <div class="form-group">
                {!! Form::submit(Lang::get('user.create'), 
                    ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/user/js/shop.js"></script>
<script type="text/javascript">
    var shop = new shop();
    shop.init();
</script>
@stop
