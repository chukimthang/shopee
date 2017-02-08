@extends('layouts.user.app')

@section('content')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">@lang('user.category')</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <h4>@lang('user.product')</h4>
                                <div class="icon">
                                    <img src="https://cf.shopee.vn/file/15b728105cce1def74c065b15828e9eb" alt="">
                                </div>
                                <p class="price" align="center">@lang('user.price')<p>
                            </div>
                            <div class="box-bottom">
                                <a href="#">@lang('user.learn_more')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
               
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">@lang('user.category')</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <h4>@lang('user.product')</h4>
                                <div class="icon">
                                    <img src="https://cf.shopee.vn/file/15b728105cce1def74c065b15828e9eb" alt="">
                                </div>
                                <h5 align="center">@lang('user.price')</h5>
                            </div>
                            <div class="box-bottom">
                                <a href="#">@lang('user.learn_more')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
