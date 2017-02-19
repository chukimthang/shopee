@extends('layouts.seller.app')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="page-header title" align="center">@lang('seller.collection')</h3>

        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'seller.collection.store']) !!}
                @include('shared.error')
                @include('shared.flash')

                <div class="form-group">
                    {!! Form::label('name', Lang::get('seller.name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit(Lang::get('seller.add'), ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>

        <div class="col-lg-10 col-md-offset-1">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="colum" width="15%">@lang('seller.index')</th>
                        <th class="colum">@lang('seller.name')</th>
                        <th class="colum" width="10%">@lang('seller.edit')</th>
                        <th class="colum" width="10%">@lang('seller.delete')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($collections as $key => $collection)
                        <tr>
                            <td class="colum">{!! ++$key !!}</td>
                            <td class="colum" id="collection-name-{!! $collection->id !!}">
                                {!! $collection->name !!}
                            </td>
                            <td class="colum">
                                <i class="fa fa-pencil fa-fw"></i>
                                <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#collection-edit"
                                    data-id="{!! $collection->id !!}" class="update">
                                    @lang('admin.edit')
                                </a>
                            </td>
                            <td class="colum">
                                <a href="javascript:void(0)" data-id="{!! $collection->id !!}"
                                    class="delete">@lang('seller.delete')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-lg-7" align="right">
                {!! $collections->render() !!}
            </div>
        </div>
    </div>
</div>

@include('seller.collection.edit')

<script type="text/javascript" src="{!! asset('seller/js/collection.js') !!}"></script>
<script type="text/javascript">
    var collect = new collection;
    collect.init();
</script>
@stop
