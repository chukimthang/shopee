@extends('layouts.user.app')

@section('content')
<div class="container">
    <h3 class="page-header title" align="center">@lang('user.list_shop')</h3>

    <div class="col-lg-12">
        <div class="row">
            @if ($shops)
                @foreach ($shops as $shop)
                    <div class="col-md-3">
                        <div class="col-sm-6 col-md-12 
                            border-shadow-right-bottom 
                            block-shop">
                            <a href="#">
                                <img src="{!! $shop->image !!}"
                                    width="100%" height="220">
                            </a>

                            <div class="caption">
                                <div class="product-name-shop">
                                    <a href="">
                                        <h4 align="center">
                                            {!! $shop->name !!}
                                        </h4>
                                    </a>
                                </div>
                                <div>
                                    <h5 align="center">
                                        {!! $shop->category->name !!}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12" align="center">
                    {!! $shops->render() !!}
                </div>
            @else
                <h2>@lang('seller.message.table_empty')</h2>
            @endif
        </div>
    </div>
</div>
@stop
