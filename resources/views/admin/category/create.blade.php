<div class="modal fade bs-example-modal-lg create" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h3 align="center">@lang('admin.title.add', ['name' => 'chuyên mục'])</h3>
            
            <div class="form-error"></div>

            <div class="form-group add-category">
                {!! Form::label('name', Lang::get('admin.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameCategory']) !!}
            </div>

            <div class="form-group add-category">
                {!! Form::submit(Lang::get('admin.add'),
                    ['class' => 'btn btn-primary add']) !!}

                {!! Form::submit(Lang::get('admin.close'), [
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal'
                ]) !!}
            </div>
        </div>
    </div>
</div>
