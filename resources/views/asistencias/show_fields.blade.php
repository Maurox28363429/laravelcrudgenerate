<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/asistencias.fields.id').':') !!}
    <p>{{ $asistencia->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/asistencias.fields.created_at').':') !!}
    <p>{{ $asistencia->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/asistencias.fields.updated_at').':') !!}
    <p>{{ $asistencia->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/asistencias.fields.nombre').':') !!}
    <p>{{ $asistencia->nombre }}</p>
</div>

<!-- Cedula Field -->
<div class="col-sm-12">
    {!! Form::label('cedula', __('models/asistencias.fields.cedula').':') !!}
    <p>{{ $asistencia->cedula }}</p>
</div>

