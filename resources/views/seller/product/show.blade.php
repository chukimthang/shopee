@extends('layouts.seller.app')

@section('content')
<link rel="stylesheet" type="text/css" 
    href="{{ asset('/user/css/product-detail.css') }}">
<link rel="stylesheet" type="text/css" 
    href="{{ asset('/user/css/category.css') }}">

@if ($product)
    <div class="view-product">
        <div class="container">
            <div class="row">
                <h2 class="title show" align="center">{{ $product->name }}</h2>

                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div id="carousel-example-generic" 
                        class="carousel slide border-shadow-bottom" 
                        data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($product->images as $key => $image)
                                @if ($key == 0)
                                    <li data-target="#carousel-example-generic"    data-slide-to="{{ $key }}" 
                                        class="active">
                                    </li>
                                @else
                                    <li data-target="#carousel-example-generic"
                                        data-slide-to="{{ $key }}">
                                    </li>
                                @endif
                            @endforeach
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            @foreach ($product->images as $key => $image)
                                @if ($key == 0)
                                    <div class="item active">
                                        <img src="{{ asset($image->url) }}" class="img-product">
                                        <div class="carousel-caption"></div>
                                    </div>
                                @else
                                    <div class="item">
                                        <img src="{{ asset($image->url) }}" class="img-product">
                                        <div class="carousel-caption"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <a class="left carousel-control" 
                            href="#carousel-example-generic" 
                            role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" 
                                aria-hidden="true">
                            </span>
                            <span class="sr-only">
                                @lang('product.previous')
                            </span>
                        </a>

                        <a class="right carousel-control" 
                            href="#carousel-example-generic" 
                            role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"
                                aria-hidden="true"></span>
                            <span class="sr-only">@lang('product.next')</span>
                        </a>
                    </div>
                </div>

                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 
                    product-detail-right">
                    <div class="block-info-product col-md-12 col-lg-12 
                        col-sm-12 col-xs-12 border-shadow-bottom">
                        <table class="table table-hover">
                            <tr>
                                <td>@lang('seller.name')</td>
                                <td>{!! $product->name !!}</td>
                            </tr>
                            <tr>
                                <td>@lang('seller.code')</td>
                                <td>{!! $product->code !!}</td>
                            </tr>
                             <tr>
                                <td>@lang('seller.price')</td>
                                <td>{!! number_format($product->price) !!}
                                    đồng</td>
                            </tr>
                             <tr>
                                <td>@lang('seller.quantity')</td>
                                <td>{!! $product->quantity !!}</td>
                            </tr>
                             <tr>
                                <td>@lang('seller.discount')</td>
                                <td>{!! $product->discount !!}</td>
                            </tr>
                             <tr>
                                <td>@lang('seller.category')</td>
                                <td>{!! $product->category->name !!}</td>
                            </tr>
                             <tr>
                                <td>@lang('seller.shop')</td>
                                <td>{!! $product->shop->name !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 
                    margin-top-10">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12
                        border-shadow-bottom background-while padding-top-10">
                        <div class="tab-content">
                            <div class="description">
                                <h3 align="center">
                                    @lang('seller.description')
                                </h3> 
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 border-shadow-bottom
        not-found-product">
        @lang('seller.message.not_found')
    </div>
@endif
@stop 
