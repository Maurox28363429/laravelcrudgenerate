<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/piezas.fields.id').':') !!}
    <p>{{ $piezas->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/piezas.fields.created_at').':') !!}
    <p>{{ $piezas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/piezas.fields.updated_at').':') !!}
    <p>{{ $piezas->updated_at }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/piezas.fields.name').':') !!}
    <p>{{ $piezas->name }}</p>
</div>

<!-- Cantidad Field -->
<div class="col-sm-12" style='display:none'>
    {!! Form::label('cantidad', __('models/piezas.fields.cantidad').':') !!}
    <p>{{ $piezas->cantidad }}</p>
</div>
<!-- Cantidad Field -->
<div class="col-sm-12" style='display:none'>
    <label>Serial</label>
    <p>{{ $piezas->serial }}</p>
</div>
<!-- Cantidad Field -->
<div class="col-sm-12" style='display:none'>
    <label>Marca</label>
    <p>{{ $piezas->marca }}</p>
</div>
