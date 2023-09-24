<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/asistencias.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', __('models/asistencias.fields.cedula').':') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>