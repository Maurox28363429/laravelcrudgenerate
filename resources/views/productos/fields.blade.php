<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/productos.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', __('models/productos.fields.cantidad').':') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>