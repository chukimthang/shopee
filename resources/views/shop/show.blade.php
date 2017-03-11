@extends('layouts.user.app')

@section('content')
<link rel="stylesheet" type="text/css" 
    href="{{ asset('user/css/category.css') }}">
<link rel="stylesheet" type="text/css" 
    href="{{ asset('user/css/shop.css') }}">
    
@if ($shop)
    <div class="view-product">
        <div class="container">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-top-20
                border-shadow-bottom block-info-detail-shop">
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 row 
                    avatar-shop">
                    <div class="block-in">
                        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
                            <img class="img-avatar" src="{{ asset($shop->image)
                                }}" width="70" height="70">
                        </div>

                        <div class="col-md-9 col-lg-9 col-sm-4 col-xs-4">
                            <span><h4>{{ $shop->name }}</h4></span>
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                @if (Auth::user())
                                    <button id="btn-follow" 
                                        class="btn-button button4">
                                        @lang('user.product.following')
                                    </button>
                                @else
                                    <button id="btn-follow" 
                                        class="btn-button button4">
                                        @lang('user.product.follow')
                                    </button>
                                @endif
                            </div>

                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                @if (Auth::user())
                                    <button id="btn-like" 
                                        class="btn-button button4">
                                        @lang('user.product.like')
                                    </button>
                                @else
                                    <button id="btn-like" 
                                        class="btn-button button4">
                                        @lang('user.product.like')
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6
                        block-info-in-shop">
                        <span>@lang('user.count-product') 
                            {{ count($shop->products) }}
                        </span>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6
                        block-info-in-shop">
                        <span>@lang('user.product.follow') <span id="number-follow">
                            {{ count($shop->follows) }}</span></span>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6
                        block-info-in-shop">
                        <span>@lang('user.product.like') <span id="number-like">
                        {{ count($shop->likes) }}</span></span>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6
                        block-info-in-shop">
                        <span>@lang('user.product.collection') 
                        {{ count($shop->collections) }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 
                margin-top-20 padding-zero"> 
                <ul class="nav nav-tabs border-shadow-bottom block-title-tab">
                    <li class="active col-md-2" align="center"><a href="#shop">
                        @lang('user.shop')
                    </a></li>
    
                    @if (count($shop->collections) > 0)
                        <li class="dropdown col-md-2" align="center">
                            <a class="dropdown-toggle" 
                                data-toggle="dropdown" href="#">
                                @lang('user.collection') 
                                    <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($shop->collections as $key => 
                                    $collection)
                                    <li><a href="#">
                                        {{ $collection->name }}
                                    </a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>

                <div class="tab-content border-shadow-bottom block-detail-tab">
                    <div id="shop" class="tab-pane fade in active">
                        @foreach ($shop->collections as $key => $collection)
                            <div class="col-md-12 view-category">
                                <h4><span class="title-category">
                                    <a href="#">
                                        {{ $collection->name }}
                                    </a>
                                </span></h4>
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12
                                col-xs-12 padding-zero margin-top-10">
                                @foreach ($collection->products as $key => 
                                    $product)
                                    <div class="col-md-2 padding-zero
                                        block-product-category 
                                        background-while">
                                        <div>
                                            <a href="#" class="col-md-12
                                                img-product">
                                                @if (count($product->images) >
                                                    0)
                                                    <img src="{{ asset($product
                                                        ->images[0]->url) }}"
                                                        class="
                                                        image-product-all">   
                                                @endif 
                                            </a>
                                        </div>

                                        <h4 align="center">
                                            <a href="{{ route('product.show', 
                                                $product->id) }}">
                                                {{ $product->name }}
                                        </h4>

                                        <div class="price" style="margin-top: 10px;">
                                            <h5 align="center">
                                                {!! number_format($product->price) !!}
                                                đồng
                                            </h5>
                                        </div>
                                           
                                        <div class="box-bottom">
                                            <input class="button btn-add-cart-shop"
                                                value="Mua ngay" type="button">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>    
        </div>
    </div>
@else
    @lang('user.message.not_found_shop')
@endif

<script type="text/javascript" src="{{ asset('bower_components/jquery.easyPaginate/lib/jquery.easyPaginate.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/tab.js') }}"></script>
<script type="text/javascript" src="{{ asset('user/js/shop.js') }}"></script>
@stop
