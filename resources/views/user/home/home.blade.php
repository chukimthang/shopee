@extends('layouts.user.app')

@section('content')
@include('layouts.user.slide')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($categories as $category)
                    <h4 class="heading">{!! $category->name !!}</h4>
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-lg-2">
                                <div class="box">
                                    <div class="box-gray aligncenter">
                                        <h4 class="product-name">{!! $product->name !!}</h4>
                                        <div class="icon">
                                            <a href="">
                                                @if (isset($product->images[0])
                                                    )
                                                    <img src="{!! $product
                                                        ->images[0]->url !!}" 
                                                        alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <p class="price" align="center">
                                            {!! number_format($product->price) !!} đồng
                                        </p>
                                    </div>
                                    <div class="box-bottom">
                                        <input product-id="56" class="button btn-add-cart"
                                            value="Add Cart" type="button">
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop
