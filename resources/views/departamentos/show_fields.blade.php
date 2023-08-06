<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/departamentos.fields.id').':') !!}
    <p>{{ $departamentos->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/departamentos.fields.created_at').':') !!}
    <p>{{ $departamentos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/departamentos.fields.updated_at').':') !!}
    <p>{{ $departamentos->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/departamentos.fields.nombre').':') !!}
    <p>{{ $departamentos->nombre }}</p>
</div>

<!-- Codigo Field -->
<div class="col-sm-12">
    {!! Form::label('codigo', __('models/departamentos.fields.codigo').':') !!}
    <p>{{ $departamentos->codigo }}</p>
</div>

