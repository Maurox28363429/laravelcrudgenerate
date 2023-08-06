<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/areasDeTrabajos.fields.id').':') !!}
    <p>{{ $areasDeTrabajo->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/areasDeTrabajos.fields.created_at').':') !!}
    <p>{{ $areasDeTrabajo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/areasDeTrabajos.fields.updated_at').':') !!}
    <p>{{ $areasDeTrabajo->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/areasDeTrabajos.fields.nombre').':') !!}
    <p>{{ $areasDeTrabajo->nombre }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', __('models/areasDeTrabajos.fields.direccion').':') !!}
    <p>{{ $areasDeTrabajo->direccion }}</p>
</div>

