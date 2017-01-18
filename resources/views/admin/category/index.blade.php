@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">@lang('admin.category')</h3> 

        <div class="col-lg-12">
            <h4 class="col-md-9">
                <a href="" data-toggle="modal" data-target=".bs-example-modal-lg.create" class="add">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    @lang('admin.add')
                </a>
            </h4>

            <div class="col-md-3">
                {!! Form::open(['method' => 'GET', 'route' => 'admin.category.search']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => Lang::get('text.search')]) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
     
        <div>
            @if (count($categories))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.label.name')</th>
                            <th class="colum" width="12%">@lang('admin.edit')</th>
                            <th class="colum" width="12%">@lang('admin.delete')</th>
                        </tr>
                    </thead>

                    <tbody id="category-list" name="category-list">
                        @foreach ($categories as $key => $category)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td id="category-name-{{ $category->id }}">
                                    {!! $category->name !!}
                                </td>
                                <td class="center" width="12%">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="javascript:void(0)" data-toggle="modal"
                                        data-target=".bs-example-modal-lg.edit"
                                        data-id="{!! $category->id !!}" class="update">
                                        @lang('admin.edit')</a>
                                </td>
                                <td class="colum" width="12%">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    <a href="javascript:void(0)" data-id="{!! $category->id !!}" 
                                        value="{!! $category->id !!}" class="delete">
                                        @lang('admin.delete')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div align="center">
                    {!! $categories->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'Category'])</h4>
            @endif
        </div>
    </div>
</div>

@include('admin.category.create')
@include('admin.category.edit')

<script src="{{ asset('/admin/js/category.js') }}"></script>
<script>
    var category = new category();
    category.init();
</script>
@stop
