@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">@lang('admin.user')</h3> 

        <div class="col-lg-12">
            <div class='col-md-3 col-md-offset-9 form-group'>
                {!! Form::open(['method' => 'GET', 'route' => 'admin.user.search']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => Lang::get('text.search')]) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
     
        <div>
            @if (count($users))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.label.name')</th>
                            <th class="colum">@lang('admin.email')</th>
                            <th class="colum">@lang('admin.phone')</th>
                            <th class="colum">@lang('admin.detail')</th>
                            <th class="colum" width="12%">@lang('admin.delete')</th>
                        </tr>
                    </thead>

                    <tbody id="user-list" name="user-list">
                        @foreach ($users as $key => $user)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->phone !!}</td>
                                <td>
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                    <a href="javascript:void(0)" 
                                        data-toggle="modal" 
                                        data-target=".bs-example-modal-lg"
                                        data-id="{!! $user->id !!}"
                                        data-name="{!! $user->name !!}" 
                                        data-email="{!! $user->email !!}"
                                        data-phone="{!! $user->phone !!}"
                                        data-avatar="{!! $user->avatar !!}"
                                        class="detail">
                                        @lang('admin.detail')
                                    </a>
                                </td>
                                <td class="colum" width="12%">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    <a href="javascript:void(0)" data-id="{!! $user->id !!}"
                                        value="{!! $user->id !!}" class="delete">
                                        @lang('admin.delete')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div align="center">
                    {!! $users->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'user'])</h4>
            @endif
        </div>
    </div>
</div>

@include('admin.user.show')

<script src="{{ asset('/admin/js/user.js') }}"></script>
<script>
    var user = new user();
    user.init();
</script>
@stop
