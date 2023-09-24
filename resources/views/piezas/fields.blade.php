<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/piezas.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    <label>Marca</label>
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    <label>Serial</label>
    {!! Form::text('serial', null, ['class' => 'form-control']) !!}
</div>
<!-- Cantidad Field -->
<div class="form-group col-sm-6" style='display:none'>
    {!! Form::label('cantidad', __('models/piezas.fields.cantidad').':') !!}
    {!! Form::number('cantidad', 0, ['class' => 'form-control']) !!}
</div>
