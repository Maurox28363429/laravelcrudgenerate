<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/areasDeTrabajos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion', __('models/areasDeTrabajos.fields.direccion').':') !!}
    {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
</div>