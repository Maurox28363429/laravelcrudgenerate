<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/departamentos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', __('models/departamentos.fields.codigo').':') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>