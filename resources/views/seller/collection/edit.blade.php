<div class="modal fade" tabindex="-1" role="dialog" id="collection-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title title" align="center">
                    @lang('seller.param.edit', ['name' => 'bộ sưu tập'])
                </h3>
            </div>

            <div class="modal-body form">
                {!! Form::label('name', Lang::get('seller.name')) !!}
                {!! Form::text(Lang::get('seller.name'), null, [
                    'class' => 'form-control',
                    'id' => 'collection-edit-name'
                ]) !!}
                <div class="form-error"></div>
            </div>

            <div class="modal-footer form">
                {!! Form::submit(Lang::get('text.close'), [
                    'class' => 'btn btn-default',
                    'data-dismiss' =>'modal'
                ]) !!}
                {!! Form::submit(Lang::get('seller.update'), 
                    ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
