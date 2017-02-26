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
                    @lang("seller.param.add", ['name' => 'sản phẩm'])
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
                <div class="col-md-3">
                    <div class="col-sm-6 col-md-12 border-shadow-right-bottom block-product-shop">
                        <a href="">
                            <img src="http://www.w3schools.com/bootstrap/cinqueterre.jpg" width="100%" height="200">
                        </a>
                        <div class="caption">
                            <div class="product-name-shop">
                                <a href="">
                                    <h4>San pham 1</h4>
                                </a>
                            </div>

                            <div class="price-and-number">
                                <span>140.000 d</span>
                                <span class="product-in-stock">Kho hàng 12
                                    </span>
                            </div>
                            <div class="buy-and-comment">
                                <span>Bán 0</span>
                                <span class="comment">Binh luan 0</span>
                            </div>
                        </div>
                    </div>
                </div>
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
