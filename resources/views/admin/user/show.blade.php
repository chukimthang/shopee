<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="user-show">
            <div class="modal-header">
                <h2 align="center" class="title-detail">@lang('admin.info_user')</h2>
            </div>

            <div class="modal-body">
                <table width="70%" class="table-detail">
                    <tr>
                        <td width="30%">@lang('admin.name')</td>
                        <td id="user-name"></td>
                    </tr>
                    <tr>
                        <td>@lang('admin.email')</td>
                        <td id="user-email"></td>
                    </tr>
                    <tr>
                        <td>@lang('admin.phone')</td>
                        <td id="user-phone"></td>
                    </tr>
                    <tr>
                        <td>@lang('admin.avatar')</td>
                        <td id="user-avatar"></td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                {!! Form::submit(Lang::get('admin.close'), [
                        'class' => 'btn btn-default',
                        'data-dismiss' => 'modal'
                    ]) !!}
            </div>
        </div>
    </div>
</div>
