<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/asignars.fields.id').':') !!}
    <p>{{ $asignar->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/asignars.fields.created_at').':') !!}
    <p>{{ $asignar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/asignars.fields.updated_at').':') !!}
    <p>{{ $asignar->updated_at }}</p>
</div>

<!-- Analista Field -->
<div class="col-sm-12">
    {!! Form::label('Analista', __('models/asignars.fields.Analista').':') !!}
    <p>{{ $asignar->Analista }}</p>
</div>

<!-- Activo Field -->
<div class="col-sm-12">
    {!! Form::label('Activo', __('models/asignars.fields.Activo').':') !!}
    <p>{{ $asignar->Activo }}</p>
</div>

<!-- Herramienta Field -->
<div class="col-sm-12">
    {!! Form::label('Herramienta', __('models/asignars.fields.Herramienta').':') !!}
    <p>{{ $asignar->Herramienta }}</p>
</div>

<!-- Entrega Field -->
<div class="col-sm-12">
    {!! Form::label('Entrega', __('models/asignars.fields.Entrega').':') !!}
    <p>{{ $asignar->Entrega }}</p>
</div>

<!-- Devuelto Field -->
<div class="col-sm-12">
    {!! Form::label('Devuelto', __('models/asignars.fields.Devuelto').':') !!}
    <p>{{ $asignar->Devuelto }}</p>
</div>

