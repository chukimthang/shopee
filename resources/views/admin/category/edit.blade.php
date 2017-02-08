<div class="modal fade bs-example-modal-lg edit" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" id="modal-create-category">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <h3 align="center">@lang('admin.title.edit', ['name' => 'chuyên mục'])</h3>
            
            <div class="form-error"></div>

            <div class="form-group edit-category">
                {!! Form::label('name', Lang::get('admin.name')) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'nameEditCategory']) !!}
            </div>

            <div class="form-group edit-category">
                {!! Form::submit(Lang::get('admin.edit'), 
                    ['class' => 'btn btn-primary edit']) !!}
                        
                {!! Form::submit(Lang::get('admin.close'), [
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal'
                ]) !!}
            </div>
        </div>
    </div>
</div>
