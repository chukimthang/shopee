@extends('layouts.seller.app')

@section('content')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 col-ls-12 row-item row introduct-shop">
            <div><h3>@lang('seller.welcome')</h3></div>
            <div class="margin-top-30"><h4>@lang('seller.please_choose')</h4></div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-ls-12 row-item row margin-top-50">
            <div class="col-xs-12 col-sm-12 col-md-3 col-ls-3">
                <a href="{!! route('seller.collection.index') !!}">
                    <div class="block-categoty-shop one"></div>
                </a>
                <a href="{!! route('seller.collection.index') !!}">
                    <div class="name-category-shop"><h4>@lang('seller.collection')</h4></div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-ls-3">
                <a href="{!! route('seller.product.index') !!}">
                    <div class="block-categoty-shop two"></div>
                </a>
                <a href="{!! route('seller.product.index') !!}">
                    <div class="name-category-shop"><h4>@lang('seller.product')</h4></div>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-ls-3">
                <a href=""><div class="block-categoty-shop three"></div></a>
                <a href="">
                    <div class="name-category-shop"><h4>@lang('seller.order')</h4></div>
                </a>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-3 col-ls-3" >
                <a href="{!! route('shop.show', Auth::user()->shop->id) !!}">
                    <div class="block-categoty-shop four"></div></a>
                <a href="{!! route('shop.show', Auth::user()->shop->id) !!}">
                    <div class="name-category-shop"><h4>@lang('seller.show_shop')</h4></div>
                </a>
            </div>
        </div>

        <div align="center">
            <a href="{!! route('home') !!}">@lang('seller.redirect_home')</a>
        </div>
    </div>
@stop
