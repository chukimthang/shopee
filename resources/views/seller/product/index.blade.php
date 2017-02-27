@extends('layouts.seller.app')

@section('content')
<div class="container">
    <h3 class="page-header title" align="center">@lang('seller.product')</h3>

    <div class="container">
        <div class="col-md-12">
            <div class="col-md-3">
                <h4><a href="javascrip:void(0)" data-toggle="modal" 
                    data-target=".bs-example-modal-lg.create">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    @lang("seller.add")
                </a></h4>
            </div>
               
            <div class="col-md-3 form-group">
                {!! Form::open() !!}
                    <div class="col-md-10">
                        {!! Form::select('filter',[], null, [
                            'class' => 'form-control', 
                            'placeholder' => 'Tất cả',
                        ])!!}
                    </div>
                    
                    <div class="col-md-2">
                        {!! Form::submit(Lang::get('seller.filter'), 
                            ['class' => 'btn btn-primary filter-player-admin'])
                        !!}
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="col-md-3 col-md-offset-3 form-group">
                {!! Form::open() !!}
                    {!! Form::text('search', null, [
                        'id' => 'text-search-player',
                        'class' => 'form-control', 
                        'placeholder' => 'Search'
                    ]) !!}
                    <i class="fa fa-search" aria-hidden="true" 
                        id="search-team"></i>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="clear"></div>
        <div class="speace30"></div>

        <div class="col-lg-12">
            <div class="row">
                @if ($products)
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="col-sm-6 col-md-12 
                                border-shadow-right-bottom 
                                block-product-shop">
                                <a href="">
                                    <img src="{!! $product->images[0]->url !!}"
                                        width="100%" height="220">
                                </a>

                                <div class="caption">
                                    <div class="product-name-shop">
                                        <a href="">
                                            <h4 align="center">
                                                {!! $product->name !!}
                                            </h4>
                                        </a>
                                    </div>
                                </div>

                                <div class="price">
                                    <h5 align="center">
                                        {!! number_format($product->price
                                            ) !!} đồng
                                    </h5>
                                </div>
                                
                                <div class="action" align="center">
                                    <a href="#" class="delete"
                                        data-id="{!! $product->id !!}">
                                        <span class="glyphicon glyphicon-trash"
                                            aria-hidden="true">
                                        </span>
                                        @lang('seller.delete')
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12" align="center">
                        {!! $products->render() !!}
                    </div>
                @else
                    <h2>@lang('seller.message.table_empty')</h2>
                @endif
            </div>
        </div>
    </div>

    @include('seller.product.create')
</div>

<script type="text/javascript" src="/seller/js/product.js"></script>
<script type="text/javascript">
    var product = new product();
    product.init();
</script>
@stop
