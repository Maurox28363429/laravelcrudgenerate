<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/productos.fields.name').':') !!}
    <p>{{ $productos->name }}</p>
</div>

<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/productos.fields.id').':') !!}
    <p>{{ $productos->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/productos.fields.created_at').':') !!}
    <p>{{ $productos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/productos.fields.updated_at').':') !!}
    <p>{{ $productos->updated_at }}</p>
</div>

<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', __('models/productos.fields.cantidad').':') !!}
    <p>{{ $productos->cantidad }}</p>
</div>

