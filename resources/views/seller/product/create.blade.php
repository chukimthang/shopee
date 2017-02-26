<div class="modal fade bs-example-modal-lg create" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title title" align="center">
                    @lang('seller.param.add', ['name' => 'Sản phẩm'])
                </h3>
            </div>
            
            <div class="modal-body form-product">
                <div class="form-error"></div>

                <div class="form-group">
                    {!! Form::label('name', Lang::get('seller.name')) !!}
                    {!! Form::text('name', null, [
                        'class' => 'form-control', 
                        'placeholder' => Lang::get('seller.param.holder', 
                            ['name' => 'Tên'])
                    ]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('code', Lang::get('seller.code')) !!}
                    {!! Form::text('code', null, [
                        'class' => 'form-control',
                        'placeholder' => Lang::get('seller.param.holder',
                            ['name' => 'Mã'])
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', Lang::get('seller.price')) !!}
                    {!! Form::text('price', null, [
                        'class' => 'form-control',
                        'placeholder' => Lang::get('seller.param.holder',
                            ['name' => 'Giá'])
                    ]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('quantity', Lang::get('seller.quantity')) 
                    !!}
                    {!! Form::text('quantity', null, [
                        'class' => 'form-control',
                        'placeholder' => Lang::get('seller.param.holder', 
                            ['name' => 'Số Lượng'])
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('discount', Lang::get('seller.discount')) 
                    !!}
                    {!! Form::text('discount', null, [
                        'class' => 'form-control',
                        'placeholder' => Lang::get('seller.param.holder', 
                            ['name' => 'Chiết Khấu'])
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', Lang::get('seller.status')) !!}
                    {!! Form::select(
                        'status', 
                        config('myconfig.status'),
                        null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('seller.param.choose', 
                                ['name' => 'Trạng Thái'])
                        ]) 
                    !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', [
                        'id' => 'photo-product', 
                        'accept' => 'image/*'
                    ]) !!}
                    {!! Form::submit('Upload', [
                        'id' => 'upload-product',
                        'class' => 'btn btn-default'
                    ]) !!}
                    <div id="process-product" style="display: none">Process...</div>
                    <p id="display-product"></p>
                </div>

                <div class="form-group">
                    {!! Form::label('description', 
                        Lang::get('seller.description')
                    ) !!}
                    {!! Form::textarea('description', null, [
                        'class' => 'form-control',
                        'placeholder' => Lang::get('seller.param.holder',
                            ['name' => 'Mô Tả'])
                    ]) !!}
                </div>
            </div>

            <div class="modal-footer form-product">
                {!! Form::submit(Lang::get('text.reset'), [
                    'class' => 'btn btn-default'
                ]) !!}
                {!! Form::submit(Lang::get('seller.add'), 
                    ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
