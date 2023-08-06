<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/analistas.fields.id').':') !!}
    <p>{{ $analista->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/analistas.fields.created_at').':') !!}
    <p>{{ $analista->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/analistas.fields.updated_at').':') !!}
    <p>{{ $analista->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/analistas.fields.nombre').':') !!}
    <p>{{ $analista->nombre }}</p>
</div>

<!-- Apellido Field -->
<div class="col-sm-12">
    {!! Form::label('apellido', __('models/analistas.fields.apellido').':') !!}
    <p>{{ $analista->apellido }}</p>
</div>

<!-- Cedula Field -->
<div class="col-sm-12">
    {!! Form::label('cedula', __('models/analistas.fields.cedula').':') !!}
    <p>{{ $analista->cedula }}</p>
</div>

<!-- Departamento Field -->
<div class="col-sm-12">
    {!! Form::label('Departamento', __('models/analistas.fields.Departamento').':') !!}
    <p>{{ $analista->Departamento }}</p>
</div>

<!-- Area De Trabajo Field -->
<div class="col-sm-12">
    {!! Form::label('Area de trabajo', __('models/analistas.fields.Area de trabajo').':') !!}
    <p>{{ $analista->Area de trabajo }}</p>
</div>

<!-- Cargo Field -->
<div class="col-sm-12">
    {!! Form::label('Cargo', __('models/analistas.fields.Cargo').':') !!}
    <p>{{ $analista->Cargo }}</p>
</div>

