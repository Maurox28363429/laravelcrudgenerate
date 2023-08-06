<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', __('models/misAnalistasses.fields.Nombre').':') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Indicador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Indicador', __('models/misAnalistasses.fields.Indicador').':') !!}
    {!! Form::text('Indicador', null, ['class' => 'form-control']) !!}
</div>

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cedula', __('models/misAnalistasses.fields.Cedula').':') !!}
    {!! Form::text('Cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Departamento', __('models/misAnalistasses.fields.Departamento').':') !!}
    {!! Form::select('Departamento', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Area De Trabajo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Area_de_trabajo', __('models/misAnalistasses.fields.Area_de_trabajo').':') !!}
    {!! Form::select('Area_de_trabajo', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Cargo', __('models/misAnalistasses.fields.Cargo').':') !!}
    {!! Form::select('Cargo', ['' => ''], null, ['class' => 'form-control custom-select']) !!}
</div>
