@extends('layouts.user.app')

@section('content')
<div class="container">
    <h3 class="cart-title" align="center">@lang('user.cart')</h3>
    <div class="cart" id="cart">
        @include('user.cart.cart')
    </div>
</div>

<script type="text/javascript" src="{!! asset('user/js/cart.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/lang.js') !!}"></script>
<script type="text/javascript">
    var cart = new cart;
    cart.init();
</script>
@stop
