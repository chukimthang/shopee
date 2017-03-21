<table class="table">
    <thead>
        <tr>
            <td class="colum-head" height="40">
                @lang('user.product.name')</td>
            <td class="colum-head">
                @lang('user.product.image')</td>
            <td class="colum-head">
                @lang('user.one_price')</td>
            <td class="colum-head">
                @lang('user.product.quantity')</td>
            <td class="colum-head">
                @lang('user.sub_total')</td>
            <td class="colum-head">
                @lang('user.delete')</td>
        </tr>
    </thead>
    <tbody class="data-table-cart">
        @if ($carts)
            @foreach ($carts as $cart)
                <tr>
                    <td><a href="{!! route('product.show', $cart->id) !!}"> 
                        {!! $cart->name !!}</a></td>
                    <td><img src="{!! $cart->options['image'] !!}" 
                        alt="" width="70" height="70"></td>
                    <td align="center">
                        {!! number_format($cart->price) !!}</td>
                    <td align="center">
                        <a class="cart-quantity up" 
                            data-id="{!! $cart->rowId !!}" 
                            href="javascript:void(0)"> + </a>
                        {!! $cart->qty!!}
                        <a class="cart-quantity down" 
                            data-id="{!! $cart->rowId !!}" 
                            href="javascript:void(0)"> - </a>
                    </td>
                    <td align="center">
                        {!! number_format($cart->subtotal) !!}</td>
                    <td align="center">
                        <a href="javascript:void(0)" 
                            data-id="{!! $cart->rowId !!}" 
                            class="delete">
                            <span class="glyphicon glyphicon-remove-sign">
                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <h2 align="center">@lang('user.message.not_product_cart')</h2>
        @endif
    </tbody>
</table>

<div class="total-price col-lg-11" align="right">
    <h4>@lang('user.total'): 
        <span id="cart-total">{!! Cart::subtotal() !!}</span> đồng
    </h4>
</div>
