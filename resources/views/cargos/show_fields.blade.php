<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/cargos.fields.id').':') !!}
    <p>{{ $cargos->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/cargos.fields.created_at').':') !!}
    <p>{{ $cargos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/cargos.fields.updated_at').':') !!}
    <p>{{ $cargos->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/cargos.fields.nombre').':') !!}
    <p>{{ $cargos->nombre }}</p>
</div>

<!-- Codigo Field -->
<div class="col-sm-12">
    {!! Form::label('codigo', __('models/cargos.fields.codigo').':') !!}
    <p>{{ $cargos->codigo }}</p>
</div>

