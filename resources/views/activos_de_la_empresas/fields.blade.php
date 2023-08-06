<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/activosDeLaEmpresas.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', __('models/activosDeLaEmpresas.fields.modelo').':') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', __('models/activosDeLaEmpresas.fields.marca').':') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Diagnostico Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('diagnostico', __('models/activosDeLaEmpresas.fields.diagnostico').':') !!}
    {!! Form::textarea('diagnostico', null, ['class' => 'form-control']) !!}
</div>

<!-- Ods Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ODS', __('models/activosDeLaEmpresas.fields.ODS').':') !!}
    {!! Form::text('ODS', null, ['class' => 'form-control']) !!}
</div>