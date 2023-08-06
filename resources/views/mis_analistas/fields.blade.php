<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', __('models/misAnalistas.fields.Nombre').':') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Indicador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Indicador', __('models/misAnalistas.fields.Indicador').':') !!}
    {!! Form::text('Indicador', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cedula', __('models/misAnalistas.fields.Cedula').':') !!}
    {!! Form::text('Cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Departamento', __('models/misAnalistas.fields.Departamento').':') !!}
    {!! Form::select('Departamento', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Area De Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Area_de_trabajo', __('models/misAnalistas.fields.Area_de_trabajo').':') !!}
    {!! Form::select('Area_de_trabajo', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cargo', __('models/misAnalistas.fields.Cargo').':') !!}
    {!! Form::select('Cargo', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>
