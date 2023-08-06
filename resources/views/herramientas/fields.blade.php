<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', __('models/herramientas.fields.Nombre').':') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', __('models/herramientas.fields.stock').':') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', __('models/herramientas.fields.codigo').':') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>